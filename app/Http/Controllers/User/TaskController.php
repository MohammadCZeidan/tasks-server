<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller{
    
    function getAllTasks($id = null){
        if(!$id){
            $tasks = Task::all();
            return response()->json(["data" => $tasks]);
        }

        $task = Task::find($id);
        return $task;
    }

}
