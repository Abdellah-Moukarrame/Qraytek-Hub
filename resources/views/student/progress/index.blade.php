@extends('layouts.app')

@section('title', 'My Progress')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.student-sidebar')

    <main class="flex-1 flex flex-col overflow-hidden">

        <header class="h-16 flex-shrink-0 flex items-center px-8 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
            <h2 class="text-lg font-bold">My Progress</h2>
        </header>

        <div class="flex-1 overflow-y-auto p-8 space-y-8">

            {{-- Stats --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @php
                $stats = [
                    ['label' => 'Study Hours', 'value' => '48h', 'icon' => 'schedule', 'color' => 'bg-primary/10 text-primary'],
                    ['label' => 'Sessions Done', 'value' => '28', 'icon' => 'video_call', 'color' => 'bg-emerald-50 text-emerald-600'],
                    ['label' => 'Courses Completed', 'value' => '2', 'icon' => 'check_circle', 'color' => 'bg-indigo-50 text-indigo-600'],
                    ['label' => 'Avg. Score', 'value' => '87%', 'icon' => 'trending_up', 'color' => 'bg-amber-50 text-amber-600'],
                ];
                @endphp
                @foreach($stats as $stat)
                <div class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                    <div class="p-3 {{ $stat['color'] }} rounded-xl">
                        <span class="material-symbols-outlined">{{ $stat['icon'] }}</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">{{ $stat['label'] }}</p>
                        <h3 class="text-2xl font-bold">{{ $stat['value'] }}</h3>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                {{-- Course Progress --}}
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                    <h3 class="font-bold mb-6">Course Progress</h3>
                    <div class="space-y-5">
                        @php
                        $courses = [
                            ['title' => 'Advanced UI Systems', 'teacher' => 'Sarah Miller', 'progress' => 85, 'color' => 'bg-primary'],
                            ['title' => 'React Advanced Hooks', 'teacher' => 'David Chen', 'progress' => 40, 'color' => 'bg-emerald-500'],
                            ['title' => 'Italian Literature', 'teacher' => 'Marco Rossi', 'progress' => 20, 'color' => 'bg-amber-500'],
                            ['title' => 'Quantum Mechanics', 'teacher' => 'Dr. Sarah Miller', 'progress' => 100, 'color' => 'bg-indigo-500'],
                        ];
                        @endphp
                        @foreach($courses as $course)
                        <div>
                            <div class="flex justify-between items-center mb-1.5">
                                <div>
                                    <p class="text-sm font-semibold">{{ $course['title'] }}</p>
                                    <p class="text-xs text-slate-500">{{ $course['teacher'] }}</p>
                                </div>
                                <span class="text-sm font-bold {{ $course['progress'] === 100 ? 'text-emerald-600' : 'text-slate-700 dark:text-slate-300' }}">
                                    {{ $course['progress'] }}%
                                </span>
                            </div>
                            <div class="w-full h-2 bg-slate-100 dark:bg-slate-700 rounded-full overflow-hidden">
                                <div class="h-full {{ $course['color'] }} rounded-full" style="width: {{ $course['progress'] }}%"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Weekly Activity --}}
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                    <h3 class="font-bold mb-6">Weekly Study Activity</h3>
                    <div class="flex items-end justify-between gap-2 h-40">
                        @php
                        $days = [
                            ['day' => 'Mon', 'hours' => 2],
                            ['day' => 'Tue', 'hours' => 4],
                            ['day' => 'Wed', 'hours' => 1],
                            ['day' => 'Thu', 'hours' => 5],
                            ['day' => 'Fri', 'hours' => 3],
                            ['day' => 'Sat', 'hours' => 6],
                            ['day' => 'Sun', 'hours' => 2],
                        ];
                        $max = 6;
                        @endphp
                        @foreach($days as $day)
                        <div class="flex flex-col items-center gap-2 flex-1">
                            <span class="text-xs font-bold text-slate-500">{{ $day['hours'] }}h</span>
                            <div class="w-full rounded-t-lg bg-primary/20 relative" style="height: {{ ($day['hours'] / $max) * 100 }}%">
                                <div class="absolute bottom-0 w-full rounded-t-lg bg-primary" style="height: 100%"></div>
                            </div>
                            <span class="text-xs text-slate-400 font-medium">{{ $day['day'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

            {{-- Recent Sessions --}}
            <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                <div class="p-6 border-b border-slate-100 dark:border-slate-700">
                    <h3 class="font-bold">Recent Sessions</h3>
                </div>
                <div class="divide-y divide-slate-100 dark:divide-slate-700">
                    @php
                    $sessions = [
                        ['initials' => 'SM', 'color' => 'bg-primary/20 text-primary', 'name' => 'Sarah Miller', 'subject' => 'Component Architecture', 'date' => 'Oct 10, 2024', 'duration' => '1h', 'score' => 92],
                        ['initials' => 'DC', 'color' => 'bg-emerald-100 text-emerald-600', 'name' => 'David Chen', 'subject' => 'React Hooks Deep Dive', 'date' => 'Oct 5, 2024', 'duration' => '1h', 'score' => 85],
                        ['initials' => 'MR', 'color' => 'bg-indigo-100 text-indigo-600', 'name' => 'Marco Rossi', 'subject' => 'Italian Grammar', 'date' => 'Sep 28, 2024', 'duration' => '1h', 'score' => 78],
                    ];
                    @endphp
                    @foreach($sessions as $session)
                    <div class="flex items-center gap-4 px-6 py-4">
                        <div class="size-10 rounded-full {{ $session['color'] }} flex items-center justify-center font-bold text-sm">
                            {{ $session['initials'] }}
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold">{{ $session['subject'] }}</p>
                            <p class="text-xs text-slate-500">with {{ $session['name'] }}</p>
                        </div>
                        <span class="text-xs text-slate-400">{{ $session['date'] }}</span>
                        <span class="text-xs text-slate-400">{{ $session['duration'] }}</span>
                        <span class="text-sm font-bold {{ $session['score'] >= 90 ? 'text-emerald-600' : ($session['score'] >= 80 ? 'text-primary' : 'text-amber-600') }}">
                            {{ $session['score'] }}%
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </main>
</div>

@endsection
