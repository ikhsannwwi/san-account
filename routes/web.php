<?php

use App\Http\Controllers\admin\accountController;
use App\Http\Controllers\admin\appController;
use App\Http\Controllers\admin\viewController;
use App\Http\Controllers\users\role_userController;
use App\Http\Controllers\users\userController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/account',[viewController::class, 'admin_index'])->name('admin_index');
Route::get('/admin/account',[viewController::class, 'admin_account'])->name('admin_account');
Route::get('/admin/app',[viewController::class, 'admin_app'])->name('admin_app');
Route::get('/admin/role-user',[viewController::class, 'admin_role_user'])->name('admin_role_user');
Route::get('/admin/user',[userController::class, 'admin_user'])->name('admin_user');






// -------------------------------------------- Start Login -----------------------------------------------//
Route::get('/admin/login',[userController::class, 'login'])->name('login');
Route::post('/admin/login-proses',[userController::class, 'login_proses'])->name('login_proses');
Route::get('/admin/logout',[userController::class, 'logout'])->name('logout');
// -------------------------------------------- End Login -----------------------------------------------//






// -------------------------------------------- Start Admin User -----------------------------------------------//
Route::get('/admin/user/add-user',[userController::class, 'add_user'])->name('add_user');
Route::post('/admin/user/insert-user',[userController::class, 'insert_user'])->name('insert_user');
Route::get('/admin/user/edit-user-password/{id}',[userController::class, 'edit_user_password'])->name('edit_user_password');
Route::post('/admin/user/update-user-password/{id}',[userController::class, 'update_user_password'])->name('update_user_password');
Route::get('/admin/user/edit-user/{id}',[userController::class, 'edit_user'])->name('edit_user');
Route::post('/admin/user/update-user/{id}',[userController::class, 'update_user'])->name('update_user');
Route::get('/admin/user/delete-user/{id}',[userController::class, 'delete_user'])->name('delete_user');
// -------------------------------------------- End Admin User -----------------------------------------------//



// -------------------------------------------- Start Admin Role User -----------------------------------------------//
Route::get('/admin/role-user/add-role-user',[role_userController::class, 'add_role_user'])->name('add_role_user');
Route::post('/admin/role-user/insert-role-user',[role_userController::class, 'insert_role_user'])->name('insert_role_user');
Route::get('/admin/role-user/edit-role-user/{id}',[role_userController::class, 'edit_role_user'])->name('edit_role_user');
Route::post('/admin/role-user/update-role-user/{id}',[role_userController::class, 'update_role_user'])->name('update_role_user');
Route::get('/admin/role-user/delete-role-user/{id}',[role_userController::class, 'delete_role_user'])->name('delete_role_user');
// -------------------------------------------- End Admin Role User -----------------------------------------------//






// -------------------------------------------- Start Admin App -----------------------------------------------//
Route::get('/admin/app/add-app',[appController::class, 'add_app'])->name('add_app');
Route::post('/admin/app/insert-app',[appController::class, 'insert_app'])->name('insert_app');
Route::get('/admin/app/edit-app/{id}',[appController::class, 'edit_app'])->name('edit_app');
Route::post('/admin/app/update-app/{id}',[appController::class, 'update_app'])->name('update_app');
Route::get('/admin/app/delete-app/{id}',[appController::class, 'delete_app'])->name('delete_app');
// -------------------------------------------- End Admin App -----------------------------------------------//





// -------------------------------------------- Start Admin Account -----------------------------------------------//
Route::get('/admin/account/add-account',[accountController::class, 'add_account'])->name('add_account');
Route::post('/admin/account/insert-account',[accountController::class, 'insert_account'])->name('insert_account');
Route::get('/admin/account/edit-account/{id}',[accountController::class, 'edit_account'])->name('edit_account');
Route::post('/admin/account/update-account/{id}',[accountController::class, 'update_account'])->name('update_account');
Route::get('/admin/account/delete-account/{id}',[accountController::class, 'delete_account'])->name('delete_account');
// -------------------------------------------- End Admin Account -----------------------------------------------//