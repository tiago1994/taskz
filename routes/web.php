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
Auth::routes();

Route::as('site.')->group(function () {
    Route::get('/' , \App\Http\Livewire\Site\Home::class)->name('index');
});

Route::namespace('User')->as('user.')->middleware('auth')->group(function () {
    Route::get('/user', 'HomeController@index')->name('index');
});

Route::namespace('Admin')->as('admin.')->middleware('is_admin')->group(function () {
    Route::get('/admin', 'HomeController@index')->name('index');
});