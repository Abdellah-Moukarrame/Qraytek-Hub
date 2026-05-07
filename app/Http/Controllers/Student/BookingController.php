<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Courses;
use App\Models\Personne\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // ─── index ────────────────────────────────────────
    public function index()
    {
        $upcomingBookings = Booking::with(['teacher.personne', 'course'])
            ->where('student_id', Auth::user()->id)
            ->where('status', 'confirmed')
            ->where('date', '>=', now()->toDateString())
            ->orderBy('date')->orderBy('time')
            ->get();

        $pastBookings = Booking::with(['teacher.personne', 'course'])
            ->where('student_id', Auth::user()->id)
            ->whereIn('status', ['completed', 'cancelled'])
            ->latest()
            ->paginate(10);

        return view('student.bookings.index', compact('upcomingBookings', 'pastBookings'));
    }

    // ─── create ───────────────────────────────────────
    public function create(Request $request)
    {
        $selectedTeacher = null;
        if ($request->teacher_id) {
            $selectedTeacher = Teacher::with('personne')
                ->where('status', 'approved')
                ->findOrFail($request->teacher_id);
        }

        $teachers = Teacher::with('personne')->where('status', 'approved')->get();
        $courses  = Courses::all();

        return view('student.bookings.create', compact('teachers', 'courses', 'selectedTeacher'));
    }

    // ─── store ────────────────────────────────────────
    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'course_id'  => 'nullable|exists:courses,id',
            'date'       => 'required|date|after_or_equal:today',
            'time'       => 'required',
            'duration'   => 'required|in:30,60,90,120',
            'topic'      => 'nullable|string|max:255',
            'notes'      => 'nullable|string|max:1000',
        ]);

        $teacher = Teacher::findOrFail($request->teacher_id);
        $price   = ($request->duration / 60) * $teacher->hourly_rate;

        $booking = Booking::create([
            'student_id' => Auth::user()->id,
            'teacher_id' => $request->teacher_id,
            'course_id'  => $request->course_id,
            'date'       => $request->date,
            'time'       => $request->time,
            'duration'   => $request->duration,
            'topic'      => $request->topic,
            'notes'      => $request->notes,
            'status'     => 'pending',
            'price'      => $price,
        ]);

        return redirect()->route('payment.checkout', $booking->id);
    }

    // ─── show ─────────────────────────────────────────
    public function show($id)
    {
        $booking = Booking::with(['teacher.personne', 'course', 'payment'])
            ->where('student_id', Auth::user()->id)
            ->findOrFail($id);

        return view('student.bookings.show', compact('booking'));
    }

    // ─── destroy: cancel ──────────────────────────────
    public function destroy($id)
    {
        $booking = Booking::where('student_id', Auth::user()->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->findOrFail($id);

        $booking->update(['status' => 'cancelled']);

        return redirect()->route('student.bookings.index')
            ->with('success', 'Booking cancelled successfully.');
    }
}
