<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserManagementController;


Route::patch('/submit_resetpassword/{id}', [AuthController::class, 'reset_password_save'])->name('submit_resetpassword');
Route::post('/authenticate', [AuthController::class, 'authenticate']);


Route::controller(AuthController::class)->group(function () {
    Route::post('/forgot_password', 'forgot_password')->name('forgot_password.submit');
    Route::post('/logout', 'logout')->middleware('auth');
});


Route::controller(UserManagementController::class)->group(function () {
    Route::put('/submit_addaccount', 'user_add');
    Route::get('/user_management', 'index')->name('user_management')->middleware('auth');
    Route::get('/user_management_edit/{id}', 'user_edit')->name('user_management_edit')->middleware('auth');
    Route::patch('/submit_editaccount/{id}', 'user_edit_save')->name('submit_editaccount');
    Route::patch('/submit_disabledaccount/{id}', 'user_disabled_save')->name('submit_disabledaccount');
});





Route::get('/forgot_password', function () { return view('auth.forgot_password'); });



Route::get('/', function () {
    return view('auth.login');
});

Route::get('/account', function () {
    return view('admin.account');
});

Route::get('/company', function () {
    return view('admin.company');
});