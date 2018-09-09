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
})->name('beranda');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', 'AdminController@dashboard')->name('admin');
    Route::group(['middleware' => 'App\Http\Middleware\UserAccessControl'], function()
    {
        Route::get('/loket', 'AdminController@loket')->name('check.in');
        Route::get('/gudang', 'AdminController@gudang')->name('gudang');
        Route::post('/create', 'AdminController@createQueue')->name('create.queue');
        
    });


});

