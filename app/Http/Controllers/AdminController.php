<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Role;


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
        //dd($roles);
        return view('users', ['users'=>$roles]);
    }

     public function edit($id)
    {
        $users = \App\User::with('roles')->find($id);
        //dd($users);
        return view('user_edit',['users'=>$users]);
    }

     public function save(Request $request)
    {
        $inputs = $request;
        dd($inputs);
        return view('users');
    }
}
//