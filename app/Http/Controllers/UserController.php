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
    	$images = \App\Image::where('user_id',$id)->paginate(10);
        $guides = \App\Guide::where('user_id',$id)->paginate(10);
    	return view('web/user_profile', ['user' => $user, 'images' => $images, 'guides' => $guides]);
    	
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

    public function delete($id)
    {
    
        $image = \App\Image::with('comments')->find($id);
        $image->comments()->delete();
        $image->delete();
        return redirect()->action('HomeController@index');
       
    }


    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'id' => 'required',
        'image_name' => 'required|max:255',
        'image_description' => 'required|max:255',
        'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

            if ($request->hasFile('file')) {
                $file_name = $request->file->getClientOriginalName();
                $path = $request->file->storeAs('public', $file_name);
                $file_description = $request->description;

                }
                    $request_image = [
                    'user_id'=> $request['id'],
                    'name'=> $request['image_name'],
                    'description'=> $request['image_description'],
                    'file_name'=> $file_name,
                    'path' => $path,
                    ];
            
        \App\Image::create($request_image);         
        return redirect()->action('UserController@index');

    }

    public function remove($id)
    {
    
        $guide = \App\Guide::find($id);
        $guide->delete();
        return redirect()->action('HomeController@index');
       
    }
}
