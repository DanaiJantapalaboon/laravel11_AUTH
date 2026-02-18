<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementController;

Route::put('/submit_addaccount', [UserManagementController::class, 'add_user']);
Route::get('/admin/user_management', [UserManagementController::class, 'index'])->name('user_management'); // name() ใช้เฉพาะ route()



Route::get('/', function () {
    return view('auth.login');
});

Route::get('/account', function () {
    return view('admin.account');
});

Route::get('/company', function () {
    return view('admin.company');
});

Route::get('/forgot_password', function () {
    return view('auth.forgot_password');
});