<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Item;

class TasksController extends Controller
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
     * Show current User Tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $tasks = DB::table('user_tasks')->where('user_id','=',$id)->paginate(15);
        
        return view('myTasks',['tasks' => $tasks]);
    }

    /**
     * Edit User Tasks.
     *
     * @return \Illuminate\Http\Response
     */

        public function edit(Request $request)
    {        
        $inputs = $request;
        dd($inputs);
        //return view('editTasks');
    }

    /**
     * Delete Task.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $inputs = $request->except('X-CSRF-TOKEN');
        dd($inputs);
        $rules = [
            'task_id'        => 'required',
        ];
        \Validator::validate($rules, $inputs);
        if (\Validator::passes()) {
            $tasks = DB::table('user_tasks')->find($inputs['task_id']);
            $tasks->delete();
        }
    }
}
