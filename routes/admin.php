<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Auth::routes(['register' => false]);
Route::group(['middleware' => 'web'], function () {
  Auth::routes();
  Route::get('/login', 'HomeController@login')->name('login');
  Route::post('/login', 'Auth\LoginController@checklogin')->name('login');

  Route::group(['middleware' => ['auth'], 'as' => 'admin.', 'namespace' => 'Admin'], function () {

    Route::redirect('/', 'admin/dashboard');
    Route::get('/dashboard', 'DashBoardController@dashboard')->name('dashboard');

    Route::post('forms/switchUpdate', 'FormController@switchUpdate')->name('forms.switchUpdate');
    Route::resource('forms', 'FormController');
  });
});
