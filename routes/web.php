<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

//Route::resource('user', UserController::class);
Route::resource('posts', PostController::class);

//customer crud
Route::get('customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
Route::get('customer/create',[App\Http\Controllers\CustomerController::class,'create'])->name('customer.create');
Route::post('customer/store',[App\Http\Controllers\CustomerController::class,'store'])->name('customer.store');
Route::get('customer/edit/{id}',[App\Http\Controllers\CustomerController::class,'edit'])->name('customer.edit');
Route::post('/customer/update/{id}',[App\Http\Controllers\CustomerController::class,'update'])->name('customer.update');
Route::delete('customer/delete/{id}',[App\Http\Controllers\CustomerController::class,'destroy'])->name('customer.destroy');

// Route::post('/edit/{id}','ProjectController@update');
