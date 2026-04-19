<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personne\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        return view('admin.teachers.index');
    }

    public function show($teacher)
    {
        return view('admin.teachers.show');
    }

    public function approve($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update([
            'status'=>'approved'
        ])->save();
    }

    public function reject($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update([
            'status'=>'pending'
        ])->save();
    }

    public function destroy($teacher)
    {
        // logic later
    }
}
