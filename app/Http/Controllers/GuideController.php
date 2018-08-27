<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;
use App\Comment;
use App\Image;
use Illuminate\Support\Facades\DB;


class GuideController extends Controller
{ 
    public function index()
    {
    	$guides = \App\Guide::with(['user'])->get();
    	$id =  Auth::id();
    	return view('web/guides', ['guides' => $guides, 'id' => $id]);
    }

    public function upload(Request $request)
    {
		$validator = Validator::make($request->all(), [
        'user_id' => 'required',
        'name' => 'required|max:255',
        'desc' => 'required|max:255',
        'tags' => 'required|max:255',
        'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048'
   		]);

		if ($request->hasFile('file')) {
			$file_name = $request->file->getClientOriginalName();
			$path = $request->file->storeAs('public', $file_name);
			$file_description = $request->description;
			}

		$request_guide = [
        'user_id'=> $request['user_id'],
        'name'=> $request['name'],
        'desc'=> $request['desc'],
        'file_name'=> $file_name,
        'path' => $path,
        'tags' => $request['tags'],
    	];
        \App\Guide::create($request_guide);			
        return redirect()->action('GuideController@index')->with('message', 'Document Uploaded. Awaiting Approval.');

    }


}
