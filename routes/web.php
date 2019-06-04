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

/* Public */
Route::get('/', function () {
    return view('index', ['title' => 'LinearChat']);
})->name('index');

Route::get('/about', function () {
    return view('about', ['title' => 'About | LinearChat']);
})->name('about');
/* Public */

/* User */
Route::get('/register', function () {
    return view('forms.login', ['title' => 'Register | LinearChat']);
})->name('register');

Route::get('/login', function () {
    return view('forms.login', ['title' => 'Log In | LinearChat']);
})->name('login');
/* User */
