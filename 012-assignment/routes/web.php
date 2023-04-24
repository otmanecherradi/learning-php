<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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
  return redirect('/dashboard');
});

Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/login', [AuthController::class, 'authenticate']);
Route::post('/auth/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/branches', [BranchController::class, 'index'])->middleware('auth');
Route::get('/branches/create', [BranchController::class, 'create'])->middleware('auth');
Route::post('/branches/create', [BranchController::class, 'store'])->middleware('auth');
Route::get('/branches/{branch:pk}', [BranchController::class, 'show'])->middleware('auth');
Route::get('/branches/{branch:pk}/edit', [BranchController::class, 'edit'])->middleware('auth');
Route::put('/branches/{branch:pk}/edit', [BranchController::class, 'update'])->middleware('auth');
Route::delete('/branches/{branch:pk}/delete', [BranchController::class, 'destroy'])->middleware('auth');

Route::get('/students', [StudentController::class, 'index'])->middleware('auth');
Route::get('/students/create', [StudentController::class, 'create'])->middleware('auth');
Route::post('/students/create', [StudentController::class, 'store'])->middleware('auth');
Route::get('/students/{student:pk}', [StudentController::class, 'show'])->middleware('auth');
Route::get('/students/{student:pk}/edit', [StudentController::class, 'edit'])->middleware('auth');
Route::put('/students/{student:pk}/edit', [StudentController::class, 'update'])->middleware('auth');
Route::delete('/students/{student:pk}/delete', [StudentController::class, 'destroy'])->middleware('auth');
