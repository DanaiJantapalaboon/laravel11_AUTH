<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\UserManagementController;


Route::controller(AuthController::class)->group(function () {
    Route::post('/authenticate', 'authenticate');
    Route::post('/logout', 'logout')->middleware('auth');
    Route::post('/forgot_password.check', 'forgot_password_check');
    Route::patch('/submit_reset_password/{id}', 'reset_password_save')->name('submit_reset_password');
    Route::post('/submit_reset_password.check/{id}','reset_password_check')->name('submit_reset_password.check');
});


Route::controller(MyAccountController::class)->group(function () {
    Route::patch('/change_info.submit', 'change_info_save');
    Route::patch('/change_email.submit', 'change_email_save');
    Route::patch('/change_password.submit', 'change_password_save');
});


Route::controller(UserManagementController::class)->group(function () {
    Route::put('/add_account.submit', 'user_add');
    Route::get('/user_management', 'index')->name('user_management')->middleware('auth');
    Route::get('/user_management_edit/{id}', 'user_edit')->name('user_management_edit')->middleware('auth');
    Route::patch('/edit_account.submit/{id}', 'user_edit_save')->name('edit_account.submit');
    Route::patch('/disabled_account.submit/{id}', 'user_disabled_save')->name('disabled_account.submit');
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