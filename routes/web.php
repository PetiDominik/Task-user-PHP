<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//összes
Route::get("/api/tasks", [TaskController::class, "index"]);
Route::get("/task/list", [TaskController::class, "listView"]);

//egy get
Route::get("/api/tasks/{id}", [TaskController::class, "show"]);

// új
Route::post("/api/tasks", [TaskController::class, "store"]);
Route::get("/task/new", [TaskController::class, "newTask"]);

//edit
Route::put("/api/tasks/{id}", [TaskController::class, "update"]);
Route::get("/task/{id}", [TaskController::class, "editTask"]);

//delete
Route::delete("/api/tasks/{id}", [TaskController::class, "destroy"]);


//require __DIR__ . '/auth.php';
