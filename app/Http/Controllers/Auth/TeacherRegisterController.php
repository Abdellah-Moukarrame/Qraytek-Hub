<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Personne\Teacher as PersonneTeacher;
use App\Models\Personnes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TeacherRegisterController extends Controller
{

    public function showForm()
    {
        return view('auth.register-teacher');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|email|unique:users,email',
            'phone'            => 'nullable|string|max:20',
            'city'             => 'nullable|string|max:100',
            'password'         => 'required|string|min:8|confirmed',
            'subject'          => 'required|string|max:255',
            'experience'       => 'required|integer|min:0|max:50',
            'rate'             => 'nullable|numeric|min:0',
            'bio'              => 'nullable|string|max:1000',
            'cv_path'          => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'certificate_path' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'diploma_path'     => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'id_card_path'     => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',

            'terms'            => 'required|accepted',
            'accuracy'         => 'required|accepted',
        ], [
            'email.unique'            => 'An account with this email already exists.',
            'password.confirmed'      => 'Passwords do not match.',
            'cv_path.required'        => 'Please upload your CV.',
            'certificate_path.required' => 'Please upload your Teaching Certificate.',
            'diploma_path.required'   => 'Please upload your University Degree.',
            'id_card_path.required'   => 'Please upload your ID Card.',
            'cv_path.max'             => 'CV must not exceed 5MB.',
            'certificate_path.max'    => 'Certificate must not exceed 5MB.',
            'diploma_path.max'        => 'Degree must not exceed 5MB.',
            'id_card_path.max'        => 'ID Card must not exceed 5MB.',
            'terms.accepted'          => 'You must agree to the Terms of Service.',
            'accuracy.accepted'       => 'You must confirm the accuracy of your documents.',
        ]);

        // dd($request->all());
        $user = Personnes::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'teacher',
            'phone'    => $request->phone,
            'city'     => $request->city,

        ]);

        $cvPath          = $request->file('cv_path')->store('teachers/cv', 'private');
        $certificatePath = $request->file('certificate_path')->store('teachers/certificates', 'private');
        $diplomaPath     = $request->file('diploma_path')->store('teachers/diplomas', 'private');
        $idCardPath      = $request->file('id_card_path')->store('teachers/id_cards', 'private');

        PersonneTeacher::create([
            'personne_id'      => $user->id,
            'subject'          => $request->subject,
            'experience'       => $request->experience,
            'hourly_rate'      => $request->rate ?? 0,
            'bio'              => $request->bio,
            'cv_path'          => $cvPath,
            'certificate_path' => $certificatePath,
            'diploma_path'     => $diplomaPath,
            'id_card_path'     => $idCardPath,
            'status'           => 'pending',
        ]);



        Auth::login($user);


        return redirect()->route('teacher.dashboard')
            ->with('info', 'Your application has been submitted! Our team will review it within 48 hours.');
    }
}
