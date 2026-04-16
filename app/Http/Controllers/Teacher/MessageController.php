<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index()
    {
        return view('teacher.messages.index');
    }
}
