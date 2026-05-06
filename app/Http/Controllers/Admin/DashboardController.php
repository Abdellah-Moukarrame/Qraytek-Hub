<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\StatsController;
use App\Models\Personne\Student;
use App\Models\Personne\Teacher;
use App\Models\Personnes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $users = Personnes::with('teacher')
            ->where('role', '!=', 'admin')
            ->where(function ($query) {
                $query->where('role', '!=', 'teacher')
                    ->orWhereHas('teacher', function ($q) {
                        $q->where('status', '!=', 'pending');
                    });
            })
            ->paginate(5);

        $months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        $teachers = [];
        $students = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);

            $months[] = $date->format('M');

            $teachers[] = DB::table('personnes')
                ->where('role', 'teacher')
                ->whereDate('created_at', '<=', $date->endOfMonth())
                ->count();

            $students[] = DB::table('personnes')
                ->where('role', 'student')
                ->whereDate('created_at', '<=', $date->endOfMonth())
                ->count();
        }

        return view('admin.dashboard', compact('users', 'months', 'teachers', 'students'));
    }

    public function display_users() {}

    public function ban_user($id)
    {
        // dd('test', $id);

        $user = Personnes::findOrFail($id);
        $user->is_banned = true;
        $user->save();

        return redirect()->back();
    }
    public function unban_user($id)
    {
        $user = Personnes::findOrFail($id);
        $user->is_banned = false;
        $user->save();

        return redirect()->back();
    }
}
