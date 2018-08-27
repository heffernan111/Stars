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

    // Show All User Tasks //
    public function index()
    {
        $id = Auth::id();
        $tasks = DB::table('user_tasks')->where('user_id','=',$id)->paginate(15);
    
        return view('myTasks',['tasks' => $tasks]);
    }
    // Go To Create Task Page //
    public function create()
    {        

        return view('newTasks');
    }

    // Form Data to Create Task in user_tasks DB //
    public function store(Request $request)
    {        
        $inputs = $request->except(['_token', 'create_task']);

        $validateData = $request->validate([
            'task_title' => 'required|string|max:50',
            'task_desc' => 'required|string|max:255'
        ]);
        $inputs['user_id'] = Auth::id();
        DB::table('user_tasks')->insert($inputs);
        return redirect()->action('TasksController@index');
    }
    // Go to Edit Page //
    public function edit()
    {        
        
        return view('editTasks');
    }

    // Delete Task Function //
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
