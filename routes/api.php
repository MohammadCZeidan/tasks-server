<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\TaskController;
use App\Http\Controllers\Admin\TaskController as TaskAdminController;

Route::group(["prefix" => "v0.1"], function(){
    //Authenticated Routes
    Route::group(["prefix" => "user"], function(){
        Route::get('/tasks/{id?}', [TaskController::class, "getAllTasks"])->name("task-listing");
        Route::post('/add_task', [TaskController::class, "addTask"]);
    });

    //Authenticated Routes
    Route::group(["prefix" => "admin"], function(){
        Route::post('/delete_tasks', [TaskAdminController::class, "deleteAllTasks"]);
    });
});

//Unauthenticated Routes
Route::post('/login', [TaskController::class, "addTask"]);
Route::post('/register', [TaskController::class, "addTask"]);





/*
1- Routing DONE
2- Migrations DONE
3- Controllers
4- Models 
5- Services
6- Seeders


6- Traits
7- Middlewares
8- Advancded Models 
9- Testing
*/  