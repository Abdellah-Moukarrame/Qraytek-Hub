@extends('layouts.app')

@section('title', 'My Courses')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.student-sidebar')

    <main class="flex-1 flex flex-col overflow-hidden">

        {{-- Header --}}
        <header class="h-16 flex-shrink-0 flex items-center justify-between px-8 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
            <h2 class="text-lg font-bold">My Courses</h2>
            <div class="flex items-center gap-3">
                <select class="bg-slate-100 dark:bg-slate-800 border-none rounded-lg py-2 px-4 text-sm focus:ring-2 focus:ring-primary/50">
                    <option>All Courses</option>
                    <option>In Progress</option>
                    <option>Completed</option>
                </select>
                <a href="{{ route('student.teachers.index') }}"
                    class="flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-colors">
                    <span class="material-symbols-outlined text-lg">add_circle</span>
                    Find a Course
                </a>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8 space-y-8">

            {{-- Stats --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                    <div class="p-3 bg-primary/10 text-primary rounded-xl">
                        <span class="material-symbols-outlined">menu_book</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">Enrolled Courses</p>
                        <h3 class="text-2xl font-bold">5</h3>
                    </div>
                </div>
                <div class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                    <div class="p-3 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 rounded-xl">
                        <span class="material-symbols-outlined">check_circle</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">Completed</p>
                        <h3 class="text-2xl font-bold">2</h3>
                    </div>
                </div>
                <div class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                    <div class="p-3 bg-amber-50 dark:bg-amber-900/20 text-amber-600 rounded-xl">
                        <span class="material-symbols-outlined">hourglass_top</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">In Progress</p>
                        <h3 class="text-2xl font-bold">3</h3>
                    </div>
                </div>
            </div>

            {{-- Courses Grid --}}
            <div>
                <h3 class="text-lg font-bold mb-4">In Progress</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                    @php
                    $courses = [
                        ['title' => 'Advanced UI Systems', 'teacher' => 'Sarah Miller', 'progress' => 85, 'lessons' => 24, 'done' => 20, 'color' => 'from-primary/30 to-indigo-400/30', 'icon' => 'design_services', 'tag' => 'Design'],
                        ['title' => 'React Advanced Hooks', 'teacher' => 'David Chen', 'progress' => 40, 'lessons' => 18, 'done' => 7, 'color' => 'from-emerald-300/30 to-teal-400/30', 'icon' => 'code', 'tag' => 'Development'],
                        ['title' => 'Italian Literature', 'teacher' => 'Marco Rossi', 'progress' => 20, 'lessons' => 30, 'done' => 6, 'color' => 'from-amber-300/30 to-orange-300/30', 'icon' => 'translate', 'tag' => 'Language'],
                    ];
                    @endphp

                    @foreach($courses as $course)
                    <div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 hover:shadow-lg transition-shadow group">
                        <div class="h-32 bg-gradient-to-br {{ $course['color'] }} relative flex items-center justify-center">
                            <span class="material-symbols-outlined text-5xl text-slate-400/50">{{ $course['icon'] }}</span>
                            <div class="absolute bottom-3 left-3 bg-white/90 dark:bg-slate-900/90 backdrop-blur px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider">
                                {{ $course['tag'] }}
                            </div>
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-slate-900 dark:text-white mb-1">{{ $course['title'] }}</h4>
                            <p class="text-xs text-slate-500 mb-1">Instructor: {{ $course['teacher'] }}</p>
                            <p class="text-xs text-slate-400 mb-4">{{ $course['done'] }}/{{ $course['lessons'] }} lessons completed</p>
                            <div class="space-y-2 mb-4">
                                <div class="flex justify-between text-xs font-bold">
                                    <span class="text-slate-400">Progress</span>
                                    <span class="text-primary">{{ $course['progress'] }}%</span>
                                </div>
                                <div class="w-full h-2 bg-slate-100 dark:bg-slate-700 rounded-full overflow-hidden">
                                    <div class="h-full bg-primary rounded-full" style="width: {{ $course['progress'] }}%"></div>
                                </div>
                            </div>
                            <a href="{{ route('student.courses.show', 1) }}"
                                class="block w-full py-2 bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-white rounded-lg text-sm font-bold hover:bg-primary hover:text-white transition-all text-center">
                                Resume Lesson
                            </a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            {{-- Completed --}}
            <div>
                <h3 class="text-lg font-bold mb-4">Completed</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                    @php
                    $completed = [
                        ['title' => 'Quantum Mechanics Basics', 'teacher' => 'Dr. Sarah Miller', 'color' => 'from-purple-300/30 to-pink-300/30', 'icon' => 'science', 'tag' => 'Science'],
                        ['title' => 'Digital Marketing 101', 'teacher' => 'James Kowalski', 'color' => 'from-rose-300/30 to-orange-300/30', 'icon' => 'campaign', 'tag' => 'Marketing'],
                    ];
                    @endphp

                    @foreach($completed as $course)
                    <div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 opacity-80 hover:opacity-100 transition-opacity">
                        <div class="h-32 bg-gradient-to-br {{ $course['color'] }} relative flex items-center justify-center">
                            <span class="material-symbols-outlined text-5xl text-slate-400/50">{{ $course['icon'] }}</span>
                            <div class="absolute top-3 right-3 bg-emerald-500 text-white px-2 py-1 rounded text-[10px] font-bold flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">check</span> Completed
                            </div>
                            <div class="absolute bottom-3 left-3 bg-white/90 dark:bg-slate-900/90 backdrop-blur px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider">
                                {{ $course['tag'] }}
                            </div>
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-slate-900 dark:text-white mb-1">{{ $course['title'] }}</h4>
                            <p class="text-xs text-slate-500 mb-4">Instructor: {{ $course['teacher'] }}</p>
                            <div class="w-full h-2 bg-emerald-100 dark:bg-emerald-900/20 rounded-full mb-4">
                                <div class="h-full bg-emerald-500 rounded-full w-full"></div>
                            </div>
                            <button class="block w-full py-2 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 rounded-lg text-sm font-bold text-center">
                                View Certificate
                            </button>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </main>
</div>

@endsection
