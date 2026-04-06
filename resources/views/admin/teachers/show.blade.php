@extends('layouts.app')

@section('title', 'Teacher Profile')

@section('content')

<div class="flex min-h-screen bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.admin-sidebar')

    <main class="flex-1 ml-64 flex flex-col">

        {{-- Header --}}
        <header class="h-16 border-b border-slate-200 dark:border-slate-800 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md flex items-center justify-between px-8 sticky top-0 z-40">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.teachers.index') }}" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors text-slate-500">
                    <span class="material-symbols-outlined">arrow_back</span>
                </a>
                <h2 class="text-lg font-bold">Teacher Profile</h2>
            </div>
            <div class="flex items-center gap-3">
                <button class="px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white text-sm font-bold rounded-lg transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-lg">check_circle</span>
                    Approve Teacher
                </button>
                <button class="px-4 py-2 bg-rose-50 text-rose-600 hover:bg-rose-100 dark:bg-rose-900/20 dark:text-rose-400 text-sm font-bold rounded-lg transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-lg">cancel</span>
                    Reject
                </button>
            </div>
        </header>

        <div class="p-8 space-y-6">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- Left: Profile Card --}}
                <div class="space-y-6">

                    {{-- Profile Card --}}
                    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6 flex flex-col items-center text-center">
                        <div class="size-24 rounded-full bg-primary/20 flex items-center justify-center text-primary font-black text-3xl mb-4">
                            SM
                        </div>
                        <h3 class="text-xl font-bold">Dr. Sarah Miller</h3>
                        <p class="text-sm text-slate-500 mt-1">sarah.m@edu.com</p>
                        <span class="mt-3 px-3 py-1 bg-amber-50 dark:bg-amber-900/20 text-amber-600 text-xs font-bold rounded-full">
                            Pending Validation
                        </span>
                        <div class="w-full mt-6 pt-6 border-t border-slate-100 dark:border-slate-800 space-y-3 text-left">
                            <div class="flex items-center gap-3 text-sm">
                                <span class="material-symbols-outlined text-slate-400 text-lg">location_on</span>
                                <span class="text-slate-600 dark:text-slate-400">New York, USA</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <span class="material-symbols-outlined text-slate-400 text-lg">calendar_today</span>
                                <span class="text-slate-600 dark:text-slate-400">Applied Jan 12, 2024</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <span class="material-symbols-outlined text-slate-400 text-lg">school</span>
                                <span class="text-slate-600 dark:text-slate-400">Advanced Physics</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <span class="material-symbols-outlined text-slate-400 text-lg">work_history</span>
                                <span class="text-slate-600 dark:text-slate-400">8 Years Experience</span>
                            </div>
                        </div>
                    </div>

                    {{-- Quick Stats --}}
                    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
                        <h4 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-4">Quick Stats</h4>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-600 dark:text-slate-400">Total Students</span>
                                <span class="text-sm font-bold">142</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-600 dark:text-slate-400">Courses Created</span>
                                <span class="text-sm font-bold">6</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-600 dark:text-slate-400">Sessions Held</span>
                                <span class="text-sm font-bold">340</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-600 dark:text-slate-400">Avg. Rating</span>
                                <div class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-amber-400 text-sm">star</span>
                                    <span class="text-sm font-bold">4.9</span>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-600 dark:text-slate-400">Total Earnings</span>
                                <span class="text-sm font-bold text-emerald-600">$12,400</span>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Right: Details --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- About / Bio --}}
                    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
                        <h4 class="text-base font-bold mb-3">About</h4>
                        <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                            Dr. Sarah Miller is a seasoned physics educator with over 8 years of experience teaching at university and high school levels. She specializes in advanced quantum mechanics and thermodynamics and has a passion for making complex topics accessible to all students.
                        </p>
                    </div>

                    {{-- Submitted Documents --}}
                    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
                        <h4 class="text-base font-bold mb-4">Submitted Documents</h4>
                        <div class="space-y-3">
                            @foreach(['National ID Card', 'Teaching Certificate', 'University Degree (Physics)', 'CV / Resume'] as $doc)
                            <div class="flex items-center justify-between p-3 bg-slate-50 dark:bg-slate-800/50 rounded-lg">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-primary">description</span>
                                    <span class="text-sm font-medium">{{ $doc }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-xs text-emerald-600 bg-emerald-50 dark:bg-emerald-900/20 px-2 py-0.5 rounded-full font-bold">Uploaded</span>
                                    <button class="p-1.5 text-slate-400 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-lg">download</span>
                                    </button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Courses --}}
                    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
                        <h4 class="text-base font-bold mb-4">Courses</h4>
                        <div class="space-y-3">
                            @foreach([
                                ['title' => 'Quantum Mechanics Basics', 'students' => 54, 'status' => 'published'],
                                ['title' => 'Thermodynamics Advanced', 'students' => 38, 'status' => 'published'],
                                ['title' => 'Classical Mechanics', 'students' => 0, 'status' => 'draft'],
                            ] as $course)
                            <div class="flex items-center justify-between p-3 bg-slate-50 dark:bg-slate-800/50 rounded-lg">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-indigo-500">menu_book</span>
                                    <div>
                                        <p class="text-sm font-medium">{{ $course['title'] }}</p>
                                        <p class="text-xs text-slate-500">{{ $course['students'] }} students enrolled</p>
                                    </div>
                                </div>
                                @if($course['status'] === 'published')
                                    <span class="text-xs text-emerald-600 bg-emerald-50 dark:bg-emerald-900/20 px-2 py-0.5 rounded-full font-bold">Published</span>
                                @else
                                    <span class="text-xs text-slate-500 bg-slate-100 dark:bg-slate-800 px-2 py-0.5 rounded-full font-bold">Draft</span>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
</div>

@endsection
