@extends('layouts.app')

@section('title', 'Sessions')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.teacher-sidebar')

    <main class="flex-1 flex flex-col overflow-hidden">

        <header class="h-16 flex-shrink-0 flex items-center justify-between px-8 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
            <h2 class="text-lg font-bold">Sessions</h2>
            <a href="{{ route('teacher.sessions.create') }}"
                class="flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-colors">
                <span class="material-symbols-outlined text-lg">add_circle</span>
                Schedule Session
            </a>
        </header>

        <div class="flex-1 overflow-y-auto p-8 space-y-6">

            {{-- Stats --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                $stats = [
                    ['label' => 'Upcoming', 'value' => '8', 'icon' => 'event_upcoming', 'color' => 'bg-primary/10 text-primary'],
                    ['label' => 'This Month', 'value' => '38', 'icon' => 'calendar_month', 'color' => 'bg-indigo-50 text-indigo-600'],
                    ['label' => 'Total Held', 'value' => '340', 'icon' => 'video_call', 'color' => 'bg-emerald-50 text-emerald-600'],
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

            {{-- Upcoming Sessions --}}
            <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 dark:border-slate-800">
                    <h3 class="font-bold text-lg">Upcoming Sessions</h3>
                </div>
                <div class="divide-y divide-slate-100 dark:divide-slate-800">
                    @php
                    $sessions = [
                        ['initials' => 'LK', 'color' => 'bg-primary/20 text-primary', 'name' => 'Lisa Kim', 'course' => 'Advanced UI Systems', 'topic' => 'Component Architecture', 'date' => 'Today', 'time' => '14:00 PM', 'joinable' => true],
                        ['initials' => 'JW', 'color' => 'bg-emerald-100 text-emerald-600', 'name' => 'James Wilson', 'course' => 'React Hooks', 'topic' => 'useContext Deep Dive', 'date' => 'Tomorrow', 'time' => '10:30 AM', 'joinable' => false],
                        ['initials' => 'AT', 'color' => 'bg-amber-100 text-amber-600', 'name' => 'Amira Tazi', 'course' => 'UI Design Basics', 'topic' => 'Typography Systems', 'date' => 'Oct 24', 'time' => '09:00 AM', 'joinable' => false],
                        ['initials' => 'PM', 'color' => 'bg-indigo-100 text-indigo-600', 'name' => 'Pedro Martinez', 'course' => 'Figma Mastery', 'topic' => 'Auto Layout', 'date' => 'Oct 26', 'time' => '15:00 PM', 'joinable' => false],
                    ];
                    @endphp
                    @foreach($sessions as $session)
                    <div class="flex items-center gap-5 px-6 py-4 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <div class="size-10 rounded-full {{ $session['color'] }} flex items-center justify-center font-bold text-sm flex-shrink-0">
                            {{ $session['initials'] }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold">{{ $session['name'] }}</p>
                            <p class="text-xs text-slate-500">{{ $session['course'] }} · {{ $session['topic'] }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-bold {{ $session['joinable'] ? 'text-primary' : '' }}">{{ $session['date'] }}</p>
                            <p class="text-xs text-slate-400">{{ $session['time'] }}</p>
                        </div>
                        @if($session['joinable'])
                        <button class="flex items-center gap-1.5 px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg hover:bg-primary/90 transition-colors">
                            <span class="material-symbols-outlined text-sm">video_call</span>
                            Start Now
                        </button>
                        @else
                        <div class="flex items-center gap-2">
                            <span class="px-3 py-1.5 bg-slate-100 dark:bg-slate-800 text-slate-500 text-xs font-bold rounded-lg">Scheduled</span>
                            <button class="p-1.5 text-slate-400 hover:text-rose-500 hover:bg-rose-50 rounded-lg transition-colors">
                                <span class="material-symbols-outlined text-lg">cancel</span>
                            </button>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Past Sessions --}}
            <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 dark:border-slate-800">
                    <h3 class="font-bold text-lg">Past Sessions</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-slate-50 dark:bg-slate-800/50">
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Student</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Course</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Duration</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Earned</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                            @php
                            $past = [
                                ['initials' => 'LK', 'color' => 'bg-primary/20 text-primary', 'name' => 'Lisa Kim', 'course' => 'Advanced UI Systems', 'date' => 'Oct 10, 2024', 'duration' => '1h', 'earned' => '$45', 'status' => 'completed'],
                                ['initials' => 'JW', 'color' => 'bg-emerald-100 text-emerald-600', 'name' => 'James Wilson', 'course' => 'React Hooks', 'date' => 'Oct 8, 2024', 'duration' => '1h', 'earned' => '$50', 'status' => 'completed'],
                                ['initials' => 'AT', 'color' => 'bg-amber-100 text-amber-600', 'name' => 'Amira Tazi', 'course' => 'UI Design Basics', 'date' => 'Oct 5, 2024', 'duration' => '1h', 'earned' => '$35', 'status' => 'completed'],
                                ['initials' => 'PM', 'color' => 'bg-indigo-100 text-indigo-600', 'name' => 'Pedro Martinez', 'course' => 'Figma Mastery', 'date' => 'Sep 30, 2024', 'duration' => '1h', 'earned' => '$0', 'status' => 'cancelled'],
                            ];
                            @endphp
                            @foreach($past as $session)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="size-8 rounded-full {{ $session['color'] }} flex items-center justify-center font-bold text-xs">{{ $session['initials'] }}</div>
                                        <span class="text-sm font-semibold">{{ $session['name'] }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500">{{ $session['course'] }}</td>
                                <td class="px-6 py-4 text-sm text-slate-500">{{ $session['date'] }}</td>
                                <td class="px-6 py-4 text-sm font-medium">{{ $session['duration'] }}</td>
                                <td class="px-6 py-4 text-sm font-bold text-emerald-600">{{ $session['earned'] }}</td>
                                <td class="px-6 py-4">
                                    @if($session['status'] === 'completed')
                                        <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 text-xs font-bold rounded-full">Completed</span>
                                    @else
                                        <span class="px-2.5 py-1 bg-rose-50 text-rose-600 text-xs font-bold rounded-full">Cancelled</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
</div>

@endsection
