<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\StatsController;
use App\Models\Personnes;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(StatsController $stats)
    {
        $data = $stats->adminStats();
        $users = Personnes::where('role','!=','admin')->paginate(15);
        return view('admin.dashboard', compact('users','data'));
    }

    public function display_users() {}

    public function ban($id)
    {
        $user = Personnes::findOrFail($id);
        $user->update([
            'is_banned' => true,
        ])->save();
    }
    public function unban($id)
    {
        $user = Personnes::findOrFail($id);
        $user->update([
            'is_banned' => false,
        ])->save();
    }
}
