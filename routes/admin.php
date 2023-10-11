<?php

use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/role-permissions',[RolePermissionController::class,'index'])->name('admin.role-permissions');
Route::get('/admin/users',[UserController::class,'index'])->name('admin.users.index');
Route::get('/admin/create-user',[UserController::class,'create'])->name('admin.users.create');
Route::get('/admin/edit-user/{user_id}',[UserController::class,'edit'])->name('admin.users.edit');