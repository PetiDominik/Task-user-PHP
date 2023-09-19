<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //

    public function index() {
        return response()->json(Task::all());
    }

    public function show($id) {
        return response()->json(Task::find($id));
    }

    public function destroy($id) {
        Task::find($id)->delete();
        return redirect("/task/list");
    }

    public function store(Request $request) {
        $task = new Task();
        
        $task->title = $request->title;
        $task->description = $request->description;
        $task->end_date = $request->end_date;
        $task->user_id = $request->user_id;
        $task->status = $request->status;
        $task->save();

        return redirect("/task/list");
    }

    public function update(Request $request, $id) {
        $task = Task::find($id);

        $task->title = $request->title;
        $task->description = $request->description;
        $task->end_date = $request->end_date;
        $task->user_id = $request->user_id;
        $task->status = $request->status;
        $task->save();
        
        return redirect("/task/list");
    }

    public function listView() {
        $tasks = Task::all();

        return view("task.list", ["tasks" => $tasks]);
    }    

    public function editTask($id) {
        $users = User::all();
        $task = Task::find($id);

        return view("task.edit", ["users" => $users, "task" => $task]);
    }  

    public function newTask() {
        $users = User::all();
        return view("task.new", ["users" => $users]);
    }  

}
