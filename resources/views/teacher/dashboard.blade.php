@extends('layouts.app')

@section('title', 'Teacher Dashboard')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.teacher-sidebar')

    <main class="flex-1 flex flex-col overflow-hidden">

        {{-- Header --}}
        <header class="h-16 flex-shrink-0 flex items-center justify-between px-8 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
            <h2 class="text-lg font-bold">Teacher Overview</h2>
            <div class="flex items-center gap-4">
                <button class="relative p-2 text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg">
                    <span class="material-symbols-outlined">notifications</span>
                    <span class="absolute top-2 right-2 size-2 bg-red-500 rounded-full border-2 border-white dark:border-background-dark"></span>
                </button>
                <div class="h-8 w-px bg-slate-200 dark:bg-slate-700"></div>
                <a href="{{ route('teacher.sessions.create') }}"
                    class="flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-colors">
                    <span class="material-symbols-outlined text-lg">add_circle</span>
                    New Session
                </a>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8 space-y-8">

            {{-- Welcome --}}
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-extrabold tracking-tight">
                        Welcome back, {{ auth()->user()->name ?? 'Teacher' }}! 👋
                    </h1>
                    <p class="text-slate-500 mt-1">Here's what's happening with your classes today.</p>
                </div>
                <div class="hidden md:flex items-center gap-2 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 px-4 py-2 rounded-xl border border-emerald-200 dark:border-emerald-800">
                    <span class="size-2 rounded-full bg-emerald-500 animate-pulse inline-block"></span>
                    <span class="text-sm font-bold">Profile Verified</span>
                </div>
            </div>

            {{-- KPI Stats --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                $stats = [
                    ['label' => 'Total Students', 'value' => '142', 'change' => '+12 this month', 'icon' => 'group', 'color' => 'bg-primary/10 text-primary', 'up' => true],
                    ['label' => 'Active Courses', 'value' => '6', 'change' => '2 in draft', 'icon' => 'menu_book', 'color' => 'bg-indigo-50 text-indigo-600', 'up' => true],
                    ['label' => 'Sessions This Month', 'value' => '38', 'change' => '+8 vs last month', 'icon' => 'video_call', 'color' => 'bg-amber-50 text-amber-600', 'up' => true],
                    ['label' => 'Monthly Earnings', 'value' => '$1,840', 'change' => '+$240 vs last month', 'icon' => 'payments', 'color' => 'bg-emerald-50 text-emerald-600', 'up' => true],
                ];
                @endphp
                @foreach($stats as $stat)
                <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-2 {{ $stat['color'] }} rounded-lg">
                            <span class="material-symbols-outlined">{{ $stat['icon'] }}</span>
                        </div>
                        <span class="text-xs font-bold text-emerald-500 bg-emerald-50 dark:bg-emerald-900/20 px-2 py-1 rounded">
                            {{ $stat['up'] ? '↑' : '↓' }} {{ $stat['change'] }}
                        </span>
                    </div>
                    <p class="text-slate-500 text-sm font-medium">{{ $stat['label'] }}</p>
                    <h3 class="text-2xl font-bold mt-1">{{ $stat['value'] }}</h3>
                </div>
                @endforeach
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Left: Upcoming Sessions + Recent Students --}}
                <div class="lg:col-span-2 space-y-8">

                    {{-- Upcoming Sessions --}}
                    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                        <div class="p-6 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between">
                            <h3 class="font-bold text-lg">Upcoming Sessions</h3>
                            <a href="{{ route('teacher.sessions.index') }}" class="text-sm font-semibold text-primary hover:underline">View all</a>
                        </div>
                        <div class="divide-y divide-slate-100 dark:divide-slate-800">
                            @php
                            $sessions = [
                                ['initials' => 'LK', 'color' => 'bg-primary/20 text-primary', 'name' => 'Lisa Kim', 'subject' => 'Advanced UI Systems', 'day' => 'Today', 'time' => '14:00 PM', 'joinable' => true],
                                ['initials' => 'JW', 'color' => 'bg-emerald-100 text-emerald-600', 'name' => 'James Wilson', 'subject' => 'React Architecture', 'day' => 'Tomorrow', 'time' => '10:30 AM', 'joinable' => false],
                                ['initials' => 'AT', 'color' => 'bg-amber-100 text-amber-600', 'name' => 'Amira Tazi', 'subject' => 'UI Design Basics', 'day' => 'Oct 24', 'time' => '09:00 AM', 'joinable' => false],
                            ];
                            @endphp
                            @foreach($sessions as $session)
                            <div class="flex items-center gap-4 px-6 py-4">
                                <div class="size-10 rounded-full {{ $session['color'] }} flex items-center justify-center font-bold text-sm flex-shrink-0">
                                    {{ $session['initials'] }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold">{{ $session['name'] }}</p>
                                    <p class="text-xs text-slate-500 truncate">{{ $session['subject'] }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs font-bold {{ $session['joinable'] ? 'text-primary' : 'text-slate-600 dark:text-slate-300' }}">{{ $session['day'] }}</p>
                                    <p class="text-[10px] text-slate-400">{{ $session['time'] }}</p>
                                </div>
                                @if($session['joinable'])
                                <button class="flex items-center gap-1.5 px-3 py-1.5 bg-primary text-white text-xs font-bold rounded-lg hover:bg-primary/90 transition-colors">
                                    <span class="material-symbols-outlined text-sm">video_call</span>
                                    Start
                                </button>
                                @else
                                <span class="px-3 py-1.5 bg-slate-100 dark:bg-slate-800 text-slate-500 text-xs font-bold rounded-lg">Scheduled</span>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- My Courses --}}
                    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                        <div class="p-6 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between">
                            <h3 class="font-bold text-lg">My Courses</h3>
                            <a href="{{ route('teacher.courses.create') }}"
                                class="flex items-center gap-1 text-sm font-semibold text-primary hover:underline">
                                <span class="material-symbols-outlined text-base">add</span>
                                New Course
                            </a>
                        </div>
                        <div class="divide-y divide-slate-100 dark:divide-slate-800">
                            @php
                            $courses = [
                                ['title' => 'Advanced UI Systems', 'students' => 54, 'sessions' => 24, 'status' => 'published', 'color' => 'from-primary/20 to-indigo-300/20', 'icon' => 'design_services'],
                                ['title' => 'React Advanced Hooks', 'students' => 38, 'sessions' => 18, 'status' => 'published', 'color' => 'from-emerald-200/20 to-teal-300/20', 'icon' => 'code'],
                                ['title' => 'Figma Mastery', 'students' => 0, 'sessions' => 12, 'status' => 'draft', 'color' => 'from-amber-200/20 to-orange-200/20', 'icon' => 'draw'],
                            ];
                            @endphp
                            @foreach($courses as $course)
                            <div class="flex items-center gap-4 px-6 py-4 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                <div class="size-10 rounded-lg bg-gradient-to-br {{ $course['color'] }} flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-slate-500 text-lg">{{ $course['icon'] }}</span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold">{{ $course['title'] }}</p>
                                    <p class="text-xs text-slate-500">{{ $course['students'] }} students · {{ $course['sessions'] }} lessons</p>
                                </div>
                                @if($course['status'] === 'published')
                                    <span class="px-2.5 py-1 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 text-xs font-bold rounded-full">Published</span>
                                @else
                                    <span class="px-2.5 py-1 bg-slate-100 dark:bg-slate-800 text-slate-500 text-xs font-bold rounded-full">Draft</span>
                                @endif
                                <a href="{{ route('teacher.courses.show', 1) }}" class="p-1.5 text-slate-400 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                    <span class="material-symbols-outlined text-lg">arrow_forward</span>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                {{-- Right: Earnings + Recent Students --}}
                <div class="space-y-8">

                    {{-- Earnings Summary --}}
                    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-4">Earnings Summary</h3>
                        <div class="space-y-4">
                            @php
                            $earnings = [
                                ['label' => 'This Week', 'value' => '$460', 'bar' => 50],
                                ['label' => 'This Month', 'value' => '$1,840', 'bar' => 80],
                                ['label' => 'Last Month', 'value' => '$1,600', 'bar' => 70],
                            ];
                            @endphp
                            @foreach($earnings as $earning)
                            <div>
                                <div class="flex justify-between text-sm mb-1.5">
                                    <span class="text-slate-500">{{ $earning['label'] }}</span>
                                    <span class="font-bold text-emerald-600">{{ $earning['value'] }}</span>
                                </div>
                                <div class="w-full h-2 bg-slate-100 dark:bg-slate-700 rounded-full">
                                    <div class="h-full bg-emerald-500 rounded-full" style="width: {{ $earning['bar'] }}%"></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-800 flex justify-between items-center">
                            <span class="text-sm text-slate-500">Total Earnings</span>
                            <span class="text-lg font-black text-primary">$12,400</span>
                        </div>
                    </div>

                    {{-- Recent Students --}}
                    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-4">Recent Students</h3>
                        <div class="space-y-4">
                            @php
                            $students = [
                                ['initials' => 'LK', 'color' => 'bg-primary/20 text-primary', 'name' => 'Lisa Kim', 'course' => 'Advanced UI Systems'],
                                ['initials' => 'JW', 'color' => 'bg-emerald-100 text-emerald-600', 'name' => 'James Wilson', 'course' => 'React Hooks'],
                                ['initials' => 'AT', 'color' => 'bg-amber-100 text-amber-600', 'name' => 'Amira Tazi', 'course' => 'UI Design Basics'],
                                ['initials' => 'PM', 'color' => 'bg-indigo-100 text-indigo-600', 'name' => 'Pedro Martinez', 'course' => 'Figma Mastery'],
                            ];
                            @endphp
                            @foreach($students as $student)
                            <div class="flex items-center gap-3">
                                <div class="size-9 rounded-full {{ $student['color'] }} flex items-center justify-center font-bold text-xs flex-shrink-0">
                                    {{ $student['initials'] }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold truncate">{{ $student['name'] }}</p>
                                    <p class="text-xs text-slate-500 truncate">{{ $student['course'] }}</p>
                                </div>
                                <a href="{{ route('teacher.students.show', 1) }}" class="text-slate-400 hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-lg">chevron_right</span>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <a href="{{ route('teacher.students.index') }}"
                            class="mt-4 block w-full py-2 text-center text-sm font-bold text-primary border border-dashed border-primary/30 rounded-lg hover:bg-primary/5 transition-colors">
                            View All Students
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </main>
</div>

@endsection
