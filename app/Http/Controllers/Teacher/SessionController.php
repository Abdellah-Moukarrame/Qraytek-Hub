<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    public function index()
    {
        return view('teacher.sessions.index');
    }

    public function create()
    {
        return view('teacher.sessions.create');
    }

    public function store()
    {
    }
}
