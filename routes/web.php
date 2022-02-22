<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PostController;

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

//customer crud
Route::get('customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
Route::get('customer/create',[App\Http\Controllers\CustomerController::class,'create'])->name('customer.create');
Route::post('customer/store',[App\Http\Controllers\CustomerController::class,'store'])->name('customer.store');
Route::get('customer/edit/{id}',[App\Http\Controllers\CustomerController::class,'edit'])->name('customer.edit');
Route::PATCH ('/customer/update/{id}',[App\Http\Controllers\CustomerController::class,'update'])->name('customer.update');
Route::delete('customer/delete/{id}',[App\Http\Controllers\CustomerController::class,'destroy'])->name('customer.destroy');

// Route::post('/edit/{id}','ProjectController@update');


//game crud
Route::resource('game', GameController::class);
//post crud
Route::resource('posts', PostController::class);

                            //ajax crud

//Company

Route::get('/company', 'CompanyController@index')->name('company.index');
Route::get('/companies', 'CompanyController@get_company_data')->name('data');
Route::get('/addcompany', 'CompanyController@view')->name('company.view');
Route::post('/addcompany', 'CompanyController@Store')->name('company.store');
Route::delete('/addcompany/{id}', 'CompanyController@destroy')->name('company.destroy');
Route::get('/addcompany/{id}/edit', 'CompanyController@update')->name('company.update');

//books
// use App\Http\Controllers\AjaxBOOKCRUDController;

Route::get('ajax-book-crud', [App\Http\Controllers\BookController::class, 'index']);
Route::post('add-update-book', [App\Http\Controllers\BookController::class, 'store']);
Route::post('edit-book', [App\Http\Controllers\BookController::class, 'edit']);
Route::post('delete-book', [App\Http\Controllers\BookController::class, 'destroy']);
