<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
		if ($request->hasFile('file')) {
			$path = $request->file->store('images');
			}
		


    }
}
