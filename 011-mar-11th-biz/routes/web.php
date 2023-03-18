<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Route::get('/test/{name}', function ($name) {
  echo "hello $name";
});


Route::get('/users', [UsersController::class, 'find']);
Route::get('/users/create', [UsersController::class, 'create']);
Route::post('/users/create', [UsersController::class, 'store']);
Route::get('/users/{id}', [UsersController::class, 'show']);
Route::get('/users/{id}/edit', [UsersController::class, 'edit']);
Route::put('/users/{id}/edit', [UsersController::class, 'update']);
Route::delete('/users/{id}/delete', [UsersController::class, 'destroy']);
