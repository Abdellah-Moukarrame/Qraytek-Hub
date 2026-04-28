<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function show($user)
    {
        return view('admin.users.show');
    }

    public function destroy($user)
    {
        
    }
}
