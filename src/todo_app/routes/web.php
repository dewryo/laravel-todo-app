<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\TodoController;
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

Route::get('/',[PageController::class,'index'])->name('page.index');

Route::get('signup',[PageController::class,'signup'])->name('page.signup');

Route::get('login',[PageController::class,'login'])->name('page.login');

Route::get('todo_index',[TodoController::class,'index'])->name('todo.index');

Route::post('signup',[UserAdminController::class,'store'])->name('user.signup');
Route::post('login',[UserAdminController::class,'login'])->name('user.login');