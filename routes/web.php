<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementController;

Route::put('/submit_addaccount', [UserManagementController::class, 'user_add']);
Route::get('/admin/user_management', [UserManagementController::class, 'index'])->name('user_management');
Route::patch('/submit_editaccount/{id}', [UserManagementController::class, 'user_edit_save'])->name('submit_editaccount');
Route::get('/admin/user_management_edit/{id}', [UserManagementController::class, 'user_edit'])->name('user_management_edit');



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