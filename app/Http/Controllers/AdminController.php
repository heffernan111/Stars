<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\User;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/admin');
    }

     public function users()
    {
        $users = \App\User::with('roles')->orderBy('id')->get();
        //dd($users);
        return view('admin/users', ['users' => $users]);
    }

     public function edit($id)
    {
        $users = \App\User::with('roles')->find($id);
        $roles = \App\role::all();
        return view('admin/user_edit',['users'=>$users, 'roles'=>$roles]);
    }

     public function save(Request $request)
    {
        $input = $request->except(['_token','save_user']);
        $user = \App\User::find($input['id']);
        $role_id = $input['role'];
        unset($input['role']);
        foreach ($input as $key => $value) {
            $user->$key = $value;
        }
        $user->save();
        $user->roles()->sync($role_id);
        return redirect()->action('AdminController@users')->with('message', "$user->name"." ".'Updated');
    }

    public function delete($id)
    {
        $id_int = (int)$id;
        $user_id = \App\User::find($id_int);
        $user_id->roles()->detach();
        $user_id->delete();
        return redirect()->action('AdminController@users')->with('message', "$user_id->name"." ".'Completely Deleted');
       
    }

    public function ban($id)
    {
        $id_int = (int)$id;
        $user_id = \App\User::find($id_int);
        $user = [
            'banned'=> 1,
        ];
        $role = "2";
        $user_id->roles()->sync($role);
        $user_id->update($user);
        return redirect()->action('AdminController@users')->with('message', "$user_id->name"." ".'Access Removed');
       
    }

    public function unban($id)
    {
        $id_int = (int)$id;
        $user_id = \App\User::find($id_int);
        $user = [
            'banned'=> null,
        ];
        $user_id->update($user);
        return redirect()->action('AdminController@users')->with('message',"$user_id->name"." ".'Access Restored');      
    }


    public function gallery()
    {
        $images = \App\Image::with(['user','comments'])->get();
        $id =  Auth::id();
        return view('admin/admin_gallery', ['images' => $images, 'id' => $id]);
    }


    public function tasks()
    {
        $tasks = \App\Task::with('user')->get();
        return view('admin/tasks', ['tasks'=> $tasks]);
    }
}