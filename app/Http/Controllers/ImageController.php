<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


class ImageController extends Controller
{

   
    public function index()
    {

    	$images = \App\Image::with('user')->get();
    	$id =  Auth::id();
    	return view('gallery', ['images' => $images, 'id' => $id]);
    
    }

    public function upload(Request $request)
    {
		$validator = Validator::make($request->all(), [
        'id' => 'required',
        'image_name' => 'required|max:255',
        'image_description' => 'required|max:255',
        'file' => 'required|mimes:image'
   		]);

			if ($request->hasFile('file')) {
				$file_name = $request->file->getClientOriginalName();
				$path = $request->file->storeAs('public/images', $file_name);
				$file_description = $request->description;
				}
					$request_image = [
		            'user_id'=> $request['id'],
		            'image_name'=> $request['image_name'],
		            'image_description'=> $request['image_description'],
		            'file_name'=> $file_name,
		            'url'=> 'url',
		        	];
        	

		\App\Image::create($request_image);			
				
        return redirect()->action('ImageController@index')->with('message', 'Image Uploaded. Awaiting Approval.');

    }
}
