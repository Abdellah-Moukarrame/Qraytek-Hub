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

    // ══════════════════════════════════════════════════
    // ADMIN DASHBOARD STATS
    // ══════════════════════════════════════════════════
    // Covers:
    // - Total Teachers (KPI card)
    // - Active Students (KPI card)
    // - Monthly Revenue (KPI card)
    // - Pending Validations (KPI card)
    // - Recent Users table
    // - Platform Growth (chart data)
    // ══════════════════════════════════════════════════

    public function adminStats()
    {
        // ─── KPI Cards ────────────────────────────────

        // Total teachers (all)
        $totalTeachers = Teacher::count();

        // Total active students
        $totalStudents = Personnes::where('role', 'student')->count();

        // Monthly revenue — sum of all confirmed bookings this month
        // $monthlyRevenue = Booking::where('status', 'confirmed')
        //     ->whereMonth('created_at', now()->month)
        //     ->whereYear('created_at', now()->year)
        //     ->sum('price');

        // Pending teacher validations
        $pendingValidations = Teacher::where('status', 'pending')->count();

        // ─── Recent Users ──────────────────────────────

        $recentUsers = Personnes::where('role', '!=', 'admin')
            ->latest()
            ->take(6)
            ->get();

        // ─── Growth Chart (last 6 months) ─────────────

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

        // ─── Pending Teachers for validation table ─────

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

    // ══════════════════════════════════════════════════
    // TEACHER DASHBOARD STATS
    // ══════════════════════════════════════════════════
    // Covers:
    // - Total Students (KPI)
    // - Active Courses (KPI)
    // - Sessions This Month (KPI)
    // - Monthly Earnings (KPI)
    // - Upcoming Sessions list
    // - My Courses list
    // - Earnings Summary (this week, this month, total)
    // - Recent Students list
    // ══════════════════════════════════════════════════

    public function teacherStats()
    {
        $teacher = Auth::user()->teacher;

        // ─── KPI Cards ────────────────────────────────

        // Total unique students who booked this teacher
        $totalStudents = Booking::where('teacher_id', $teacher->id)
            ->where('status', '!=', 'cancelled')
            ->distinct('student_id')
            ->count('student_id');

        // Total courses
        $totalCourses = Courses::where('teacher_id', $teacher->id)->count();

        // Sessions this month (confirmed bookings)
        $sessionsThisMonth = Booking::where('teacher_id', $teacher->id)
            ->where('status', 'confirmed')
            ->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->count();

        // Monthly earnings
        $monthlyEarnings = Booking::where('teacher_id', $teacher->id)
            ->where('status', 'confirmed')
            ->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->sum('price');

        // ─── Upcoming Sessions ─────────────────────────

        $upcomingSessions = Booking::with(['student'])
            ->where('teacher_id', $teacher->id)
            ->where('status', 'confirmed')
            ->where('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->orderBy('time')
            ->take(5)
            ->get();

        // ─── My Courses ────────────────────────────────

        $courses = Courses::where('teacher_id', $teacher->id)
            ->withCount('lessons')
            ->latest()
            ->take(5)
            ->get();

        // ─── Earnings Summary ──────────────────────────

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

        // ─── Recent Students ───────────────────────────

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

    // ══════════════════════════════════════════════════
    // STUDENT DASHBOARD STATS
    // ══════════════════════════════════════════════════
    // Covers:
    // - Ongoing courses count (welcome card)
    // - Completed sessions count (welcome card)
    // - Study hours this week (welcome card)
    // - Continue Learning courses (with progress)
    // - Upcoming Lessons list
    // - Recommended teachers
    // ══════════════════════════════════════════════════

    public function studentStats()
    {
        $student = Auth::user();

        // ─── Welcome Card Stats ────────────────────────

        // Ongoing bookings (confirmed + future)
        $ongoingCount = Booking::where('student_id', $student->id)
            ->where('status', 'confirmed')
            ->where('date', '>=', now()->toDateString())
            ->count();

        // Completed sessions
        $completedCount = Booking::where('student_id', $student->id)
            ->where('status', 'completed')
            ->count();

        // Study hours this week (sum of duration in minutes / 60)
        $studyMinutesThisWeek = Booking::where('student_id', $student->id)
            ->where('status', 'completed')
            ->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])
            ->sum('duration');
        $studyHoursThisWeek = round($studyMinutesThisWeek / 60, 1);

        // ─── My Courses (enrolled) ─────────────────────

        // Get courses from confirmed bookings
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

        // ─── Upcoming Lessons ──────────────────────────

        $upcomingLessons = Booking::with(['teacher.personne', 'course'])
            ->where('student_id', $student->id)
            ->where('status', 'confirmed')
            ->where('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->orderBy('time')
            ->take(3)
            ->get();

        // ─── Recommended Teachers ──────────────────────

        // Teachers the student hasn't booked yet
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
