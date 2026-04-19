<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personnes;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function display_users(){
        $users = Personnes::all()->except(['role'=>'admin']);
        return view('admin.dashboard',compact('users'));
    }

    public function ban($id){
        $user = Personnes::findOrFail($id);
        $user->update([
            'is_banned'=>true,
        ])->save();
    }
    public function unban($id){
        $user = Personnes::findOrFail($id);
        $user->update([
            'is_banned'=>false,
        ])->save();
    }
}
