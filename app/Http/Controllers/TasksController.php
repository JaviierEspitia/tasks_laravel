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
}
