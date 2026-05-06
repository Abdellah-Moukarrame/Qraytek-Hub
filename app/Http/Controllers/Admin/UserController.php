<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personnes;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function show($id)
    {
        $user = Personnes::findOrFail($id);
        return view('admin.users.show',compact('user'));
    }

    public function destroy($user)
    {

    }
}
