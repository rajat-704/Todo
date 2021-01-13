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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [TaskController::class, 'showTask'])->middleware('auth');
Route::get('/complete', [TaskController::class, 'completedTask'])->middleware('auth');
Route::get('/incomplete', [TaskController::class, 'incompletedTask'])->middleware('auth');
Route::post('/create', [TaskController::class, 'createTask'])->middleware('auth');
Route::get('/delete/{id}', [TaskController::class, 'deleteTask'])->middleware('auth');
Route::get('/completed/{id}', [TaskController::class, 'completeTask'])->middleware('auth');
Route::get('/edit/{id}', [TaskController::class, 'fetchTask'])->middleware('auth');
Route::post('/updateTask', [TaskController::class, 'updateTask'])->middleware('auth');