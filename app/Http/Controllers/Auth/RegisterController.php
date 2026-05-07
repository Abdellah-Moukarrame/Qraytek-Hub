<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Personne\Admin;
use App\Models\Personne\Student;
use App\Models\Personnes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view("auth.register");
    }
    public function store(Request $request)
    {
        $isFirstUser = Personnes::count() === 0;

        $role = $isFirstUser ? 'admin' : 'student';

        $personne = Personnes::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
        ]);

        if ($role === 'student') {

            Student::create([
                'personne_id' => $personne->id,
            ]);
        } else {

            Admin::create([
                'personne_id' => $personne->id,
            ]);
        }

        return redirect()->route('login');
    }
}
