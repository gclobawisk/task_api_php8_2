<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\AuthController;
use App\Http\Controllers\TasksController;





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function(){
    return response()->json(['api_name' => "laravel-jwt", 'api_version' => '1.0.0']);
});


Route::prefix('v1')->group(function(){
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);


    Route::post('tasks/create', [TasksController::class, 'create']);
    Route::put('tasks/update/{id}', [TasksController::class, 'update']);
    Route::delete('tasks/{task_id}', [TasksController::class, 'delete']);


    Route::get('tasks', [TasksController::class, 'getAllTasks']);
    Route::get('tasks/{task_id}', [TasksController::class, 'getTaskById']);
});
