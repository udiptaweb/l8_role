<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.users');
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function edit($user_id)
    {
        return view('admin.users.edit', compact('user_id'));
    }
}
