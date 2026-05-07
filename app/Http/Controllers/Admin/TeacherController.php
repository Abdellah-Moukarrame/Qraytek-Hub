<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personne\Teacher;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        $totalTeachers = Teacher::count();

        $pendingTeachers = Teacher::where('status', 'pending')->count();

        $approvedTeachers = Teacher::where('status', 'approved')->count();
        $teachers = Teacher::paginate(5);
        return view('admin.teachers.index', compact('teachers','totalTeachers','pendingTeachers','approvedTeachers'));
    }

    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('admin.teachers.show', compact('teacher'));
    }

    public function approve($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update([
            'status' => 'approved'
        ]);
        return redirect()->back();
    }

    public function reject($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update([
            'status' => 'reject'
        ]);
        return redirect()->back();
    }
    public function downloadDocument($id, $type)
    {
        $teacher = Teacher::findOrFail($id);

        $path = match ($type) {
            'cv' => $teacher->cv_path,
            'certificate' => $teacher->certificate_path,
            'diploma' => $teacher->diploma_path,
            'id_card' => $teacher->id_card_path,
            default => null,
        };

        if (!$path || !Storage::disk('private')->exists($path)) {
            abort(404);
        }

        return Storage::disk('private')->download($path);
    }

    public function destroy($teacher) {}
}
