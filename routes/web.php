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
    return view('forms.register', ['title' => 'Register | LinearChat']);
})->name('register');

Route::post('/store_user', 'UserController@register')->name('store_user');

Route::get('/login', function () {
    return view('forms.login', ['title' => 'Log In | LinearChat']);
})->name('login');

Route::post('/check_user', 'UserController@login')->name('check_user');

Route::get('/forget-password', function () {
    return view('forms.forget_password', ['title' => 'Forget Password | LinearChat']);
})->name('forget_password');

Route::post('/reset_password', 'UserController@resetPassword')->name('reset_password');
/* User */

/* Chat Board */
Route::middleware(['auth'])->group(function(){
    Route::get('/chat', function () {
        return view('chat', ['title' => 'Chat | LinearChat']);
    })->name('chat');
});
/* Chat Board */
