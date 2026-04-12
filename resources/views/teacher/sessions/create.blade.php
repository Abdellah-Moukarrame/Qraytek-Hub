{{-- ================================================ --}}
{{-- SAVE AS: teacher/sessions/create.blade.php      --}}
{{-- ================================================ --}}

@extends('layouts.app')

@section('title', 'Schedule Session')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.teacher-sidebar')

    <main class="flex-1 flex flex-col overflow-hidden">

        <header class="h-16 flex-shrink-0 flex items-center gap-3 px-8 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
            <a href="{{ route('teacher.sessions.index') }}" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors text-slate-500">
                <span class="material-symbols-outlined">arrow_back</span>
            </a>
            <h2 class="text-lg font-bold">Schedule a Session</h2>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            <div class="max-w-2xl mx-auto space-y-6">

                {{-- Course & Student --}}
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                    <h3 class="font-bold mb-4">Session Details</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Select Course</label>
                            <select class="w-full bg-slate-100 dark:bg-slate-700 border-none rounded-lg py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary/50">
                                <option>Choose a course</option>
                                <option>Advanced UI Systems</option>
                                <option>React Advanced Hooks</option>
                                <option>Figma Mastery</option>
                                <option>UI Animation Basics</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Select Student</label>
                            <select class="w-full bg-slate-100 dark:bg-slate-700 border-none rounded-lg py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary/50">
                                <option>Choose a student</option>
                                <option>Lisa Kim</option>
                                <option>James Wilson</option>
                                <option>Amira Tazi</option>
                                <option>Pedro Martinez</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Topic / Lesson</label>
                            <input type="text" placeholder="e.g. Component Architecture" class="w-full bg-slate-100 dark:bg-slate-700 border-none rounded-lg py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary/50" />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Notes for student (optional)</label>
                            <textarea rows="3" placeholder="Any preparation tips or resources to share before the session..." class="w-full bg-slate-100 dark:bg-slate-700 border-none rounded-lg py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary/50 resize-none"></textarea>
                        </div>
                    </div>
                </div>

                {{-- Date & Time --}}
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                    <h3 class="font-bold mb-4">Date & Time</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Date</label>
                            <input type="date" class="w-full bg-slate-100 dark:bg-slate-700 border-none rounded-lg py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary/50" />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Start Time</label>
                            <input type="time" class="w-full bg-slate-100 dark:bg-slate-700 border-none rounded-lg py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary/50" />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Duration</label>
                            <select class="w-full bg-slate-100 dark:bg-slate-700 border-none rounded-lg py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary/50">
                                <option>30 minutes</option>
                                <option selected>1 hour</option>
                                <option>1.5 hours</option>
                                <option>2 hours</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex gap-4">
                    <a href="{{ route('teacher.sessions.index') }}"
                        class="flex-1 py-3 text-center bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300 font-bold rounded-lg hover:bg-slate-200 transition-colors">
                        Cancel
                    </a>
                    <button class="flex-1 py-3 bg-primary text-white font-bold rounded-lg hover:bg-primary/90 transition-colors flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined">event_available</span>
                        Schedule Session
                    </button>
                </div>

            </div>
        </div>
    </main>
</div>

@endsection
