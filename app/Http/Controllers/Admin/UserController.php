<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personne\Student;
use App\Models\Personnes;

class UserController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();
        $Students = Student::paginate(5);
        return view('admin.users.index',compact('Students','totalStudents'));
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
