<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;
use App\User;


class UserController extends Controller
{

   
    public function index($id)
    {
    	$user= \App\User::find($id);    	  	
    	$images = \App\Image::where('user_id',$id)->get();
    	return view('user_profile', ['user' => $user, 'images' => $images]);
    	
    }

    public function update(Request $request)
    {
    	$input = $request->except(['_token','save_user']);
    	$user = \App\User::find($input['id']);
    	   	if(Auth::id() === $user->id){
				foreach ($input as $key => $value) {
            		$user->$key = $value;
        		}
    				$user->save();
					return redirect()->action('HomeController@index');
	    		}else{
	    			return redirect()->action('HomeController@index');
	    		}	    	
    }

}
