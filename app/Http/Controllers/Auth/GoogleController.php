<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Personnes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Client;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')
            ->stateless()
            ->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')
                ->setHttpClient(new Client([
                    'verify' => false 
                ]))
                ->stateless()
                ->user();

        } catch (\Exception $e) {
            dd([
                'message' => $e->getMessage(),
                'class'   => get_class($e),
            ]);
        }

        $user = Personnes::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            $user = Personnes::create([
                'name'     => $googleUser->getName(),
                'email'    => $googleUser->getEmail(),
                'password' => bcrypt(Str::random(16)),
                'role'     => 'student',
            ]);
        }

        Auth::login($user);

        return match($user->role) {
            'admin'   => redirect()->route('admin.dashboard'),
            'teacher' => redirect()->route('teacher.dashboard'),
            'student' => redirect()->route('student.dashboard'),
            'parent'  => redirect()->route('parent.dashboard'),
            default   => redirect()->route('home'),
        };
    }
}
