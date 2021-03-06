<?php

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

Route::get('todo1', function(){
    $data['todos'] = array('Pergi Sekolah', 'Kerjakan PR', 'Tidur Malam');
    return view('todo', $data);
});
Route::get('makanan', 'makananController@index');

/**
 * Todo Route
 */
Route::get('todo/json','todoController@json');
Route::get('todo', 'todoController@index');
Route::get('todo/create', 'todoController@create');
Route::post('todo', 'todoController@store');
Route::get('todo/{id}/edit','todoController@edit');
Route::put('todo/{id}','todoController@update');
Route::delete('todo/{id}','todoController@destroy');

/**
 * Category Route
 */
Route::get('category/test','TestController@index');
Route::get('category/json','categoryController@json');
Route::get('category', 'categoryController@index');
Route::get('category/create', 'categoryController@create');
Route::post('category', 'categoryController@store');

/**
 * User Route
 */
Route::get('user','userController@index');
Route::get('user/create','userController@create');
Route::post('user', 'userController@store');
Route::get('user/{id}/edit','userController@edit');
Route::put('user/{id}','userController@update');
Route::delete('user/{id}','userController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
