<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgetPassController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }
    public function resetpass(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', 'Check your email please 📧');
        } else {
            return back()->withErrors([
                'email' => 'This email doesnt exist'
            ]);
        }
    }
}
