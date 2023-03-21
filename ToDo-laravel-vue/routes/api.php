<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//To Do
Route::post('input/{e}', [ToDoController::class, 'index']);
Route::get('getData', [ToDoController::class, 'load']);
Route::post('deleteData/{id}', [ToDoController::class, 'delete']);
Route::post('editData', [ToDoController::class, 'edit']);