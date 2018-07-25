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
        return view('admin');
    }

     public function users()
    {

        $roles = \App\User::with('roles')->orderBy('id')->get();
        return view('users', ['users'=>$roles]);
    }

     public function edit($id)
    {
        $users = \App\User::with('roles')->find($id);
        $roles = \App\role::all();
        //dd($roles);
        return view('user_edit',['users'=>$users, 'roles'=>$roles]);
    }

     public function save(Request $request)
    {

        $user = $request->except(['_token','save_user']);
        $id_int = (int)$user['id'];
        $user_id = \App\User::findOrFail($id_int);
        $user = [
            'name'=>$user['name'],
            'email'=>$user['email'],
        ];
        $user_id->update($user);
        $role_int = (int)$request['role'];    
        $user_id->roles()->sync($role_int);
        return redirect()->action('AdminController@users');
    }
}