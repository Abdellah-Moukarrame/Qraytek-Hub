@extends('layouts.app')

@section('title', 'Student Profile')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.teacher-sidebar')

    <main class="flex-1 flex flex-col overflow-hidden">

        <header class="h-16 flex-shrink-0 flex items-center justify-between px-8 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
            <div class="flex items-center gap-3">
                <a href="{{ route('teacher.students.index') }}" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors text-slate-500">
                    <span class="material-symbols-outlined">arrow_back</span>
                </a>
                <h2 class="text-lg font-bold">Student Profile</h2>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('teacher.messages.index') }}"
                    class="flex items-center gap-2 px-4 py-2 border border-slate-200 dark:border-slate-700 text-sm font-bold rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                    <span class="material-symbols-outlined text-base">chat_bubble</span>
                    Message
                </a>
                <a href="{{ route('teacher.sessions.create') }}"
                    class="flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-colors">
                    <span class="material-symbols-outlined text-base">add_circle</span>
                    Book Session
                </a>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- Left: Profile --}}
                <div class="space-y-6">

                    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6 flex flex-col items-center text-center">
                        <div class="size-24 rounded-full bg-primary/20 flex items-center justify-center text-primary font-black text-3xl mb-4">LK</div>
                        <h3 class="text-xl font-bold">Lisa Kim</h3>
                        <p class="text-sm text-slate-500 mt-1">lisa.k@yahoo.com</p>
                        <span class="mt-3 px-3 py-1 bg-indigo-50 dark:bg-indigo-900/20 text-indigo-600 text-xs font-bold rounded-full">Student</span>
                        <div class="w-full mt-6 pt-6 border-t border-slate-100 dark:border-slate-700 grid grid-cols-3 gap-4">
                            <div class="text-center">
                                <p class="text-lg font-bold">8</p>
                                <p class="text-xs text-slate-500">Sessions</p>
                            </div>
                            <div class="text-center">
                                <p class="text-lg font-bold">72%</p>
                                <p class="text-xs text-slate-500">Progress</p>
                            </div>
                            <div class="text-center">
                                <p class="text-lg font-bold text-primary">$360</p>
                                <p class="text-xs text-slate-500">Paid</p>
                            </div>
                        </div>
                    </div>

                    {{-- Upcoming session --}}
                    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                        <h4 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-4">Next Session</h4>
                        <div class="text-center space-y-2">
                            <span class="material-symbols-outlined text-4xl text-primary">event_upcoming</span>
                            <p class="font-bold">Today at 14:00 PM</p>
                            <p class="text-xs text-slate-500">Component Architecture</p>
                        </div>
                        <button class="mt-4 w-full py-2.5 bg-primary text-white text-sm font-bold rounded-lg hover:bg-primary/90 transition-colors flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-base">video_call</span>
                            Start Session
                        </button>
                    </div>

                </div>

                {{-- Right: Progress & History --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- Course Progress --}}
                    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                        <h4 class="font-bold mb-4">Course Progress</h4>
                        <div class="space-y-5">
                            @php
                            $courses = [
                                ['title' => 'Advanced UI Systems', 'progress' => 72, 'lessons' => '17/24'],
                                ['title' => 'Figma Mastery', 'progress' => 40, 'lessons' => '6/15'],
                            ];
                            @endphp
                            @foreach($courses as $course)
                            <div>
                                <div class="flex justify-between items-center mb-1.5">
                                    <p class="text-sm font-semibold">{{ $course['title'] }}</p>
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs text-slate-500">{{ $course['lessons'] }} lessons</span>
                                        <span class="text-sm font-bold text-primary">{{ $course['progress'] }}%</span>
                                    </div>
                                </div>
                                <div class="w-full h-2 bg-slate-100 dark:bg-slate-700 rounded-full overflow-hidden">
                                    <div class="h-full bg-primary rounded-full" style="width: {{ $course['progress'] }}%"></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Session History --}}
                    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                        <div class="p-5 border-b border-slate-100 dark:border-slate-700">
                            <h4 class="font-bold">Session History</h4>
                        </div>
                        <div class="divide-y divide-slate-100 dark:divide-slate-700">
                            @php
                            $sessions = [
                                ['topic' => 'Component Architecture', 'date' => 'Oct 10, 2024', 'duration' => '1h', 'score' => 92],
                                ['topic' => 'Color Theory', 'date' => 'Oct 3, 2024', 'duration' => '1h', 'score' => 85],
                                ['topic' => 'Atomic Design', 'date' => 'Sep 28, 2024', 'duration' => '1h', 'score' => 78],
                            ];
                            @endphp
                            @foreach($sessions as $session)
                            <div class="flex items-center gap-4 px-5 py-4">
                                <div class="size-9 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
                                    <span class="material-symbols-outlined text-base">video_call</span>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold">{{ $session['topic'] }}</p>
                                    <p class="text-xs text-slate-500">{{ $session['date'] }} · {{ $session['duration'] }}</p>
                                </div>
                                <span class="text-sm font-bold {{ $session['score'] >= 90 ? 'text-emerald-600' : ($session['score'] >= 80 ? 'text-primary' : 'text-amber-600') }}">
                                    {{ $session['score'] }}%
                                </span>
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
