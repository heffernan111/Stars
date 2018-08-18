<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


class UserController extends Controller
{

   
    public function index($id)
    {
       	$user= \App\User::find($id);    	  	
    	$images = \App\Image::where('user_id',$id)->get();
    	return view('user_profile', ['user' => $user, 'images' => $images]);
    
    
    }

}
