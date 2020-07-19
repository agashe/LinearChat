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
    Route::get('/Sign-up', function () {
        return view('forms.register', ['title' => 'Sign Up | LinearChat']);
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
Route::middleware(['auth', 'isConfirmedUser'])->group(function(){
    Route::get('/chat', function () {
        return view('chat', ['title' => 'Chat | LinearChat']);
    })->name('chat');

    Route::get('/get_messages', 'ChatsController@getAllMessaages')->name('get_messages');

    Route::post('/send_message', 'ChatsController@sendMessage')->name('send_message');

    Route::get('/setting', function () {
        return view('forms.edit_user', ['title' => 'Settings | LinearChat']);
    })->name('edit_user');

    Route::post('/update_user', 'UserController@update')->name('update_user');

    Route::get('/update-password', function () {
        return view('forms.update_password', ['title' => 'Update Password | LinearChat']);
    })->name('update_password');

    Route::post('/save-password', 'UserController@updatePassword')->name('save_password');

    Route::get('/logout', 'UserController@logout')->name('logout');
});
/* Authintecated User */
