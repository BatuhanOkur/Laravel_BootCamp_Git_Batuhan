<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calisankayit','HomeController@employeeCreateView');
Route::post('/calisankaydet','HomeController@employeeCreate');
Route::get('/calisanliste','HomeController@employeeList');
Route::get('/calisansil/{id}','HomeController@deleteEmployee');
Route::get('/calisanguncelle/{id}','HomeController@updateEmployeeView');
Route::post('/calisanguncelle/{id}','HomeController@updateEmployee');
Route::get('/kitapkayit','HomeController@createBookView');
Route::post('/kitapkaydet','HomeController@createBook');
Route::get('/kitapliste','HomeController@bookList');
Route::get('/kitapsil/{id}','HomeController@deleteBook');
Route::get('/kitapguncelle/{id}','HomeController@updateBookView');
Route::post('/kitapguncelle/{id}','HomeController@updateBook');


