@extends('layouts.app')

@section('title', 'Course Detail')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.student-sidebar')

    <main class="flex-1 flex flex-col overflow-hidden">

        {{-- Header --}}
        <header class="h-16 flex-shrink-0 flex items-center justify-between px-8 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
            <div class="flex items-center gap-3">
                <a href="{{ route('student.courses.index') }}" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors text-slate-500">
                    <span class="material-symbols-outlined">arrow_back</span>
                </a>
                <h2 class="text-lg font-bold">Course Detail</h2>
            </div>
            <button class="flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-colors">
                <span class="material-symbols-outlined text-lg">video_call</span>
                Join Live Session
            </button>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Left: Course Info --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- Cover --}}
                    <div class="h-48 bg-gradient-to-br from-primary/30 to-indigo-400/30 rounded-2xl flex items-center justify-center relative overflow-hidden">
                        <span class="material-symbols-outlined text-8xl text-primary/20">design_services</span>
                        <div class="absolute bottom-4 left-4">
                            <span class="bg-white/90 dark:bg-slate-900/90 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Design</span>
                        </div>
                    </div>

                    {{-- Title & Info --}}
                    <div>
                        <h1 class="text-2xl font-extrabold mb-2">Advanced UI Systems</h1>
                        <div class="flex items-center gap-4 text-sm text-slate-500">
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-base">person</span> Sarah Miller</span>
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-base">menu_book</span> 24 Lessons</span>
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-base">schedule</span> 18h total</span>
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-yellow-400 text-base">star</span>
                                <span class="font-bold text-slate-700 dark:text-slate-300">4.9</span>
                            </div>
                        </div>
                    </div>

                    {{-- Progress Bar --}}
                    <div class="bg-white dark:bg-slate-800 p-5 rounded-xl border border-slate-200 dark:border-slate-700">
                        <div class="flex justify-between text-sm font-bold mb-2">
                            <span>Your Progress</span>
                            <span class="text-primary">85% — 20/24 lessons</span>
                        </div>
                        <div class="w-full h-3 bg-slate-100 dark:bg-slate-700 rounded-full overflow-hidden">
                            <div class="h-full bg-primary rounded-full" style="width: 85%"></div>
                        </div>
                    </div>

                    {{-- Lessons List --}}
                    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                        <div class="p-5 border-b border-slate-100 dark:border-slate-700">
                            <h3 class="font-bold">Course Lessons</h3>
                        </div>
                        <div class="divide-y divide-slate-100 dark:divide-slate-700">

                            @php
                            $lessons = [
                                ['no' => 1, 'title' => 'Introduction to Design Systems', 'duration' => '45 min', 'done' => true],
                                ['no' => 2, 'title' => 'Atomic Design Principles', 'duration' => '60 min', 'done' => true],
                                ['no' => 3, 'title' => 'Color Theory & Typography', 'duration' => '50 min', 'done' => true],
                                ['no' => 4, 'title' => 'Component Architecture', 'duration' => '75 min', 'done' => false],
                                ['no' => 5, 'title' => 'Responsive Layout Systems', 'duration' => '55 min', 'done' => false],
                                ['no' => 6, 'title' => 'Accessibility in Design', 'duration' => '40 min', 'done' => false],
                            ];
                            @endphp

                            @foreach($lessons as $lesson)
                            <div class="flex items-center gap-4 px-5 py-4 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors {{ !$lesson['done'] && $loop->index === 3 ? 'bg-primary/5' : '' }}">
                                <div class="size-8 rounded-full flex items-center justify-center font-bold text-sm
                                    {{ $lesson['done'] ? 'bg-emerald-100 text-emerald-600' : ($loop->index === 3 ? 'bg-primary text-white' : 'bg-slate-100 dark:bg-slate-700 text-slate-400') }}">
                                    @if($lesson['done'])
                                        <span class="material-symbols-outlined text-sm">check</span>
                                    @else
                                        {{ $lesson['no'] }}
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold {{ $lesson['done'] ? 'text-slate-400 line-through' : 'text-slate-900 dark:text-white' }}">
                                        {{ $lesson['title'] }}
                                    </p>
                                </div>
                                <span class="text-xs text-slate-400">{{ $lesson['duration'] }}</span>
                                @if(!$lesson['done'] && $loop->index === 3)
                                    <span class="text-xs font-bold text-primary bg-primary/10 px-2 py-0.5 rounded-full">Current</span>
                                @endif
                            </div>
                            @endforeach

                        </div>
                    </div>

                </div>

                {{-- Right: Instructor & Actions --}}
                <div class="space-y-6">

                    {{-- Instructor Card --}}
                    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                        <h4 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-4">Instructor</h4>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="size-12 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold">SM</div>
                            <div>
                                <p class="font-bold">Sarah Miller</p>
                                <p class="text-xs text-slate-500">UI/UX Designer & Educator</p>
                            </div>
                        </div>
                        <div class="space-y-2 text-sm text-slate-600 dark:text-slate-400">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-base text-slate-400">group</span>
                                142 students
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-base text-slate-400">menu_book</span>
                                6 courses
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-base text-slate-400">star</span>
                                4.9 avg rating
                            </div>
                        </div>
                        <a href="{{ route('student.teachers.show', 1) }}"
                            class="mt-4 block w-full py-2 text-center text-sm font-bold text-primary border border-primary/30 rounded-lg hover:bg-primary/5 transition-colors">
                            View Profile
                        </a>
                    </div>

                    {{-- Next Session --}}
                    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                        <h4 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-4">Next Session</h4>
                        <div class="text-center space-y-2">
                            <span class="material-symbols-outlined text-4xl text-primary">event_upcoming</span>
                            <p class="font-bold">Today at 14:00 PM</p>
                            <p class="text-xs text-slate-500">Component Architecture</p>
                        </div>
                        <button class="mt-4 w-full py-2.5 bg-primary text-white text-sm font-bold rounded-lg hover:bg-primary/90 transition-colors flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-base">video_call</span>
                            Join Session
                        </button>
                    </div>

                    {{-- Book Another Session --}}
                    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                        <h4 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-4">Need More Help?</h4>
                        <p class="text-sm text-slate-500 mb-4">Book an extra 1-on-1 session with Sarah.</p>
                        <a href="{{ route('student.bookings.create') }}"
                            class="block w-full py-2 text-center text-sm font-bold bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-white rounded-lg hover:bg-primary hover:text-white transition-all">
                            Book a Session
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>

@endsection
