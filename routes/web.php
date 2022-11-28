<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/register',[HomeController::class,'register'])->name('register');
Route::get('/login',[HomeController::class,'login'])->name('LogIn');
Route::get('/',[HomeController::class,'dashboard'])->name('dashboard')->middleware(['auth']);
Route::post('/register',[UserController::class,'register'])->name('register');
Route::post('/login',[UserController::class,'login'])->name('login');
Route::get('/logout',[UserController::class,'logout'])->name('logout')->middleware(['auth']);
Route::get('/addrecord',[CrudController::class,'addview'])->name('addview')->middleware(['auth']);
Route::post('/addrecord',[CrudController::class,'insert'])->name('insert')->middleware(['auth']);
Route::get('/delete/{id}',[CrudController::class,'delete'])->middleware(['auth']);
Route::get('/edit/{id}',[CrudController::class,'edit'])->name('edit')->middleware(['auth']);
Route::post('/edit',[CrudController::class,'editdata'])->name('editdata')->middleware(['auth']);
