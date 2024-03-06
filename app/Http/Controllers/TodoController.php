<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $todo;
    public function __construct(){
        $this->todo = new Todo();
    }
    public function index(){
        $response ['tasks']= $this->todo->all();
        return view("pages.todo.index")->with($response);
    }
    public function store(Request $request){
        $this->todo->create($request->all());

        //return redirect()->back();
        return redirect()->route('home');
    }

    public function delete($task_id){
        $task = $this->todo->find($task_id);
        $task->delete();

        return redirect()->back();
}
public function done($task_id){
    $task = $this->todo->find($task_id);
    $task->done=1;
    $task->update();

    return redirect()->back();
}
}
