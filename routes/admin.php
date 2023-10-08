<?php

use App\Http\Controllers\Admin\RolePermissionController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/role-permissions',[RolePermissionController::class,'index'])->name('admin.role-permissions');