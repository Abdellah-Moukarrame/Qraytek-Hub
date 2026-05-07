<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Personne\Admin;
use App\Models\Personne\Student;
use App\Models\Personnes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Client;

class GoogleController extends Controller
{
    private function httpClient()
    {
        return new Client(['verify' => false]);
    }

    public function redirect()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->setHttpClient($this->httpClient())->stateless()->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['email' => 'Google login failed: ' . $e->getMessage()]);
        }

        $user = Personnes::where('email', $googleUser->getEmail())->first();

        if (!$user) {

            $isFirstUser = Personnes::count() === 0;

            $role = $isFirstUser ? 'admin' : 'student';

            $user = Personnes::create([
                'name'     => $googleUser->getName(),
                'email'    => $googleUser->getEmail(),
                'password' => bcrypt(Str::random(16)),
                'role'     => $role,
            ]);

            if ($role === 'student') {

                Student::create([
                    'personne_id' => $user->id,
                ]);
            } else {

                Admin::create([
                    'personne_id' => $user->id,
                ]);
            }
        }

        Auth::login($user);


        return match ($user->role) {
            'admin'   => redirect()->route('admin.dashboard'),
            'teacher' => redirect()->route('teacher.dashboard'),
            'student' => redirect()->route('student.dashboard'),
            'parent'  => redirect()->route('parent.dashboard'),
            default   => redirect()->route('login'),
        };
    }
}
