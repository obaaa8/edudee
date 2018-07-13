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

// Auth::routes();

Route::get('/user/register', 'UserController@show_register_form');
Route::post('/user/register', 'UserController@register')->name('register');


Route::post('/user/login', 'UserController@login')->name('login');

Route::get('/home', 'HomeController@index')->name('home');

// ADMIN 
// Route::resource('college', 'CollegeController');

Route::get('/admin/college', 'CollegeController@college')->name('college');
Route::get('/admin/dept', 'DeptController@dept')->name('dept');
Route::get('/admin/subject', 'SubjectController@subject')->name('subject');
