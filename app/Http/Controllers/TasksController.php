<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    /*
        store guardar el objeto asociado
    */
    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:3'
        ]);

        $task = new Task;

        $task->title = $request->title;
        $task->save();
        return redirect()->route('tasks')->with('success','Tarea creada correctamente');

    }

    public function index(){
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function show($id){
        $task = Task::find($id);
        return view('tasks.show', ['task' => $task]);
    }

    public function update(Request $request, $id){
        $task = Task::find($id);
        $task->title = $request->title;
        $task->save();
        //dd($task) sirve para debug
        return redirect()->route('tasks')->with('success','Tarea actualizada');
    }
}
