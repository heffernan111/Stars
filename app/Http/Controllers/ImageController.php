<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;
use App\Comment;
use App\Image;

class ImageController extends Controller
{

   
    public function index()
    {

    	$images = \App\Image::with(['comments.user','user'])->get();

    	$id =  Auth::id();
        //dd($images);
    	return view('gallery', ['images' => $images, 'id' => $id]);
    
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
                //$request->file('photo')->move(public_path("/uploads"), $newfilename);
                // Storage::disk('uploads')->put($file_name,'file');
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
        return redirect()->action('ImageController@index')->with('message', 'Image Uploaded. Awaiting Approval.');

    }
}
