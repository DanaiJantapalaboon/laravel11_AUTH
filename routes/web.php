<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\CompanyInfoController;
use App\Http\Controllers\UserManagementController;


Route::controller(AuthController::class)->group(function () {
    Route::post('/authenticate', 'authenticate');
    Route::post('/logout', 'logout')->middleware('auth');
    Route::post('/forgot_password.check', 'forgot_password_check');
    Route::post('/initialize_password.check', 'initialize_password_check');
    Route::patch('/submit_reset_password/{id}', 'reset_password_save')->name('submit_reset_password');
    Route::post('/submit_reset_password.check/{id}','reset_password_check')->name('submit_reset_password.check');
});


Route::controller(TestingController::class)->group(function () {
    Route::post('/add_testing.submit', 'add_testing');
    Route::get('/testing', 'index')->name('testing')->middleware('auth');
    Route::patch('/test_edit.submit/{id}', 'test_edit_save')->name('test_edit.submit');
    Route::get('/testing_edit/{id}', 'testing_edit')->name('testing_edit')->middleware('auth');
    Route::patch('/delete_testing.submit/{id}', 'delete_testing_save')->name('delete_testing.submit');
});


Route::controller(SettingController::class)->group(function () {
    Route::get('/setting', 'index')->name('setting')->middleware('auth');
    Route::post('/add_position.submit', 'add_position');
    Route::post('/add_book_type.submit', 'add_book_type');
    Route::post('/add_test_type.submit', 'add_test_type');
    Route::put('/edit_position.submit/{id}', 'edit_position_save')->name('edit_position.submit');
    Route::put('/edit_booktype.submit/{id}', 'edit_booktype_save')->name('edit_booktype.submit');
    Route::put('/edit_testtype.submit/{id}', 'edit_testtype_save')->name('edit_testtype.submit');
    Route::patch('/delete_position.submit/{id}', 'delete_position_save')->name('delete_position.submit');
    Route::patch('/delete_test_type.submit/{id}', 'delete_testtype_save')->name('delete_test_type.submit');
    Route::patch('/delete_book_type.submit/{id}', 'delete_booktype_save')->name('delete_book_type.submit');
});


Route::controller(MyAccountController::class)->group(function () {
    Route::get('/account', 'index')->name('account')->middleware('auth');
    Route::patch('/change_info.submit', 'change_info_save');
    Route::patch('/change_email.submit', 'change_email_save');
    Route::patch('/change_avatar.submit', 'change_avatar_save');
    Route::patch('/change_password.submit', 'change_password_save');
});


Route::controller(UserManagementController::class)->group(function () {
    Route::put('/add_account.submit', 'user_add');
    Route::get('/user_management', 'index')->name('user_management')->middleware('auth');
    Route::get('/user_management_edit/{id}', 'user_edit')->name('user_management_edit')->middleware('auth');
    Route::patch('/edit_account.submit/{id}', 'user_edit_save')->name('edit_account.submit');
    Route::patch('/recover_account.submit/{id}', 'recoverAccount_save')->name('recover_account.submit');
    Route::patch('/disabled_account.submit/{id}', 'user_disabled_save')->name('disabled_account.submit');
    Route::patch('/resetPassword_account.submit/{id}', 'resetPassword_save')->name('resetPassword_account.submit');
});


Route::controller(CompanyInfoController::class)->group(function () {
    Route::get('/company', 'index')->name('company')->middleware('auth');
    Route::patch('/update_companyInfo.submit', 'update_companyInfo_save');
    Route::patch('/update_companyLogo.submit', 'update_companyLogo_save');
});
    
    
Route::get('/', function () { return view('auth.login'); });
Route::get('/forgot_password', function () { return view('auth.forgot_password'); });
Route::get('/account_initialize', function () { return view('auth.account_initialize'); });