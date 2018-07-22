<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Roles;


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
        
        $roles = \App\User::all();
        //dd($roles);
        return view('users', ['users'=>$roles]);
    }

     public function usersEdit()
    {
        return view('editUser');
    }

     public function usersSave()
    {
        return view('users');
    }
}
