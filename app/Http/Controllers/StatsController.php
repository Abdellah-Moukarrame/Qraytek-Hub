<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Personnes;
use App\Models\Courses;
use App\Models\Lessons;
use App\Models\Booking;
use App\Models\Personne\Teacher ;
use Illuminate\Support\Facades\Auth;

class StatsController extends Controller
{

    

    public function adminStats()
    {

        $totalTeachers = Teacher::count();

        $totalStudents = Personnes::where('role', 'student')->count();

        // Monthly revenue — sum of all confirmed bookings this month
        // $monthlyRevenue = Booking::where('status', 'confirmed')
        //     ->whereMonth('created_at', now()->month)
        //     ->whereYear('created_at', now()->year)
        //     ->sum('price');

        $pendingValidations = Teacher::where('status', 'pending')->count();


        $recentUsers = Personnes::where('role', '!=', 'admin')
            ->latest()
            ->take(6)
            ->get();


        $growthData = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $growthData[] = [
                'month'    => $month->format('M'),
                'teachers' => Teacher::whereMonth('created_at', $month->month)
                                     ->whereYear('created_at', $month->year)
                                     ->count(),
                'students' => Personnes::where('role', 'student')
                                       ->whereMonth('created_at', $month->month)
                                       ->whereYear('created_at', $month->year)
                                       ->count(),
            ];
        }


        $pendingTeachers = Teacher::with('personne')
            ->where('status', 'pending')
            ->latest()
            ->take(5)
            ->get();

        // return view('admin.dashboard', compact(
        //     'totalTeachers',
        //     'totalStudents',
        //     // 'monthlyRevenue',
        //     'pendingValidations',
        //     'recentUsers',
        //     'growthData',
        //     'pendingTeachers',
        // ));
    }



    public function teacherStats()
    {
        $teacher = Auth::user()->teacher;


        $totalStudents = Booking::where('teacher_id', $teacher->id)
            ->where('status', '!=', 'cancelled')
            ->distinct('student_id')
            ->count('student_id');

        $totalCourses = Courses::where('teacher_id', $teacher->id)->count();

        $sessionsThisMonth = Booking::where('teacher_id', $teacher->id)
            ->where('status', 'confirmed')
            ->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->count();

        $monthlyEarnings = Booking::where('teacher_id', $teacher->id)
            ->where('status', 'confirmed')
            ->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->sum('price');


        $upcomingSessions = Booking::with(['student'])
            ->where('teacher_id', $teacher->id)
            ->where('status', 'confirmed')
            ->where('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->orderBy('time')
            ->take(5)
            ->get();


        $courses = Courses::where('teacher_id', $teacher->id)
            ->withCount('lessons')
            ->latest()
            ->take(5)
            ->get();


        $earningsThisWeek = Booking::where('teacher_id', $teacher->id)
            ->where('status', 'confirmed')
            ->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])
            ->sum('price');

        $earningsLastMonth = Booking::where('teacher_id', $teacher->id)
            ->where('status', 'confirmed')
            ->whereMonth('date', now()->subMonth()->month)
            ->whereYear('date', now()->subMonth()->year)
            ->sum('price');

        $earningsTotal = Booking::where('teacher_id', $teacher->id)
            ->where('status', 'confirmed')
            ->sum('price');


        $recentStudents = Booking::with(['student'])
            ->where('teacher_id', $teacher->id)
            ->where('status', '!=', 'cancelled')
            ->latest()
            ->take(5)
            ->get()
            ->pluck('student')
            ->unique('id');

        // return view('teacher.dashboard', compact(
        //     'totalStudents',
        //     'totalCourses',
        //     'sessionsThisMonth',
        //     'monthlyEarnings',
        //     'upcomingSessions',
        //     'courses',
        //     'earningsThisWeek',
        //     'earningsLastMonth',
        //     'earningsTotal',
        //     'recentStudents',
        // ));
    }


    public function studentStats()
    {
        $student = Auth::user();


        $ongoingCount = Booking::where('student_id', $student->id)
            ->where('status', 'confirmed')
            ->where('date', '>=', now()->toDateString())
            ->count();

        $completedCount = Booking::where('student_id', $student->id)
            ->where('status', 'completed')
            ->count();

        $studyMinutesThisWeek = Booking::where('student_id', $student->id)
            ->where('status', 'completed')
            ->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])
            ->sum('duration');
        $studyHoursThisWeek = round($studyMinutesThisWeek / 60, 1);


        $myCourses = Courses::whereHas('bookings', function ($q) use ($student) {
                $q->where('student_id', $student->id)
                  ->where('status', 'confirmed');
            })
            ->withCount([
                'bookings as completed_sessions' => function ($q) use ($student) {
                    $q->where('student_id', $student->id)
                      ->where('status', 'completed');
                },
                'bookings as total_sessions' => function ($q) use ($student) {
                    $q->where('student_id', $student->id);
                }
            ])
            ->with('teacher.personne')
            ->take(4)
            ->get();


        $upcomingLessons = Booking::with(['teacher.personne', 'course'])
            ->where('student_id', $student->id)
            ->where('status', 'confirmed')
            ->where('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->orderBy('time')
            ->take(3)
            ->get();


        $bookedTeacherIds = Booking::where('student_id', $student->id)
            ->pluck('teacher_id');

        $recommendedTeachers = Teacher::with('personne')
            ->where('status', 'approved')
            ->whereNotIn('id', $bookedTeacherIds)
            ->inRandomOrder()
            ->take(3)
            ->get();

        // return view('student.dashboard', compact(
        //     'ongoingCount',
        //     'completedCount',
        //     'studyHoursThisWeek',
        //     'myCourses',
        //     'upcomingLessons',
        //     'recommendedTeachers',
        // ));
    }
}
