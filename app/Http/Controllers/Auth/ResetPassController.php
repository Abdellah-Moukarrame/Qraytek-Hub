<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Personnes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class ResetPassController extends Controller
{
    
    public function index(Request $request, string $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }


    public function update(Request $request)
    {
        $request->validate([
            'token'                 => 'required',
            'email'                 => 'required|email',
            'password'              => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ], [
            'password.confirmed' => 'Passwords do not match.',
            'password.min'       => 'Password must be at least 8 characters.',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (Personnes $user, string $password) {
                $user->forceFill([
                    'password'       => Hash::make($password),

                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            $user = Personnes::where('email', $request->email)->first();
            Auth::login($user);


            return match($user->role) {
                'admin'   => redirect()->route('admin.dashboard')->with('success', 'Password reset successfully!'),
                'teacher' => redirect()->route('teacher.dashboard')->with('success', 'Password reset successfully!'),
                'student' => redirect()->route('student.dashboard')->with('success', 'Password reset successfully!'),
                'parent'  => redirect()->route('parent.dashboard')->with('success', 'Password reset successfully!'),
                default   => redirect()->route('login.index')->with('success', 'Password reset successfully!'),
            };
        }


        return back()->withErrors([
            'email' => __($status)
        ]);
    }
}
