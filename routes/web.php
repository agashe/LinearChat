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

/* Unauthintecated User */
Route::middleware(['notAuser'])->group(function(){
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

    Route::get('/confirm_user/{id}/{code}', 'UserController@confirmUser')->name('confirm_user');
});
/* Unauthintecated User */

/* Authintecated User */
Route::middleware(['auth'])->group(function(){
    Route::get('/chat', function () {
        return view('chat', ['title' => 'Chat | LinearChat']);
    })->name('chat');

    Route::get('/logout', 'UserController@logout')->name('logout');
});
/* Authintecated User */
