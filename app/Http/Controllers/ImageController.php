<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;
use App\Comment;
use App\Image;
use Illuminate\Support\Facades\DB;


class ImageController extends Controller
{ 
    public function index()
    {
    	$images = \App\Image::with(['comments.user','user'])->get();
    	$id =  Auth::id();
    	return view('web/gallery', ['images' => $images, 'id' => $id]);
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
                        return redirect()->action('ImageController@index')->with('message', 'Image Uploaded. Awaiting Approval.');

    }

    public function comment(Request $request)
    {
        $user = Auth::user()->id;
        $comment = [
            'user_id' => $user,
            'content' => $request['text'],
            'image_id' => $request['image_id'],
        ];
        DB::table('comments')->insert($comment);
        return redirect()->action('ImageController@index')->with('message', 'Comment Sent');       
    }
}
