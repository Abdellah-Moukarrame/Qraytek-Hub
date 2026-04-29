<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Auth::user()->teacher
            ->courses()
            ->withCount(['lessons'])
            ->latest()
            ->paginate(9);

        return view('teacher.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('teacher.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'category'    => 'required|string',
            'level'       => 'required|in:beginner,intermediate,advanced',
            'image_path'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'lessons'     => 'nullable|array',
            'lessons.*'   => 'nullable|string|max:255',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('courses/covers', 'public');
        }
        // dd(Auth::user()->teacher->id);
        $course = Courses::create([
            'teacher_id'  => Auth::user()->teacher->id,
            'title'       => $request->title,
            'description' => $request->description,
            'category'    => $request->category,
            'level'       => $request->level,
            'image_path'  => $imagePath,
        ]);

        if ($request->lessons) {
            foreach (array_filter($request->lessons) as $index => $title) {
                $course->lessons()->create([
                    'title' => $title,
                    'order' => $index + 1,
                ]);
            }
        }

        return redirect()->route('teacher.courses.show', $course->id)
            ->with('success', 'Course created successfully!');
    }

    public function show($id)
    {
        $course = Courses::with(['lessons', 'enrollments'])
            ->where('teacher_id', Auth::user()->teacher->id)
            ->findOrFail($id);
        $lessons = $course->lessons;

        return view('teacher.courses.show', compact('course','lessons'));
    }

    public function edit($id)
    {
        $course = Courses::where('teacher_id', Auth::user()->teacher->id)
            ->findOrFail($id);

        return view('teacher.courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = Courses::where('teacher_id', Auth::user()->teacher->id)
            ->findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'category'    => 'required|string|max:100',
            'level'       => 'required|in:beginner,intermediate,advanced',
            'image_path'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $course->image_path;
        if ($request->hasFile('image_path')) {
            if ($course->image_path) {
                Storage::disk('public')->delete($course->image_path);
            }
            $imagePath = $request->file('image_path')
                ->store('courses/covers', 'public');
        }

        $course->update([
            'title'       => $request->title,
            'description' => $request->description,
            'category'    => $request->category,
            'level'       => $request->level,
            'image_path'  => $imagePath,
        ]);

        return redirect()->route('teacher.courses.show', $course->id)
            ->with('success', 'Course updated successfully!');
    }

    public function destroy($id)
    {
        $course = Courses::where('teacher_id', Auth::user()->teacher->id)
            ->findOrFail($id);

        if ($course->image_path) {
            Storage::disk('public')->delete($course->image_path);
        }

        $course->delete();

        return redirect()->route('teacher.courses.index')
            ->with('success', 'Course deleted successfully!');
    }
}
