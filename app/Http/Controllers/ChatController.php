<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
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

        $chat = DB::table('user_chat')->paginate(15);

        return view('chat',['chat'=>$chat]);
    }

    
       public function new(Request $request)
    {

        $inputs = $request->except('_token');
        $validateData = $request->validate([
            'text' => 'required|max:255',            
        ]);
        $inputs['user_id'] = Auth::id();
        DB::table('user_chat')->insert($inputs);
        return redirect()->action('ChatController@index');
    }
}
