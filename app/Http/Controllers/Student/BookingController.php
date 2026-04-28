<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function index()
    {
        return view('student.bookings.index');
    }

    public function create()
    {
        return view('student.bookings.create');
    }

    public function store()
    {

    }

    public function show($booking)
    {
        return view('student.bookings.show');
    }

    public function destroy($booking)
    {
        
    }
}
