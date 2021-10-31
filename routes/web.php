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

//login
Route::get('/', function () {
    return view('auth.login');
});
Route::match(['get', 'post'], '/login', 'LoginController@login')->name('login');
//logout
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::group(['middleware' => ['auth']], function () {
    // dashboard
    Route::get('/dashboard', 'LoginController@dashboard')->name('dashboard');
    //roles
    Route::resource('roles', RoleController::class);
    //users
    Route::resource('users', UserController::class);
    //change password
    Route::get('/password', 'LoginController@changepassword')->name('password.index');
    Route::put('/change-Password', 'LoginController@password_update')->name('password.update');

    //notifications
    Route::get('/notification', 'LoginController@notifications')->name('notification');
    Route::get('/Usermarkasread', function () {
        auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUserNotify')->markAsRead();
        return redirect()->route('users.index');
    })->name('Usermarkasread');
});
