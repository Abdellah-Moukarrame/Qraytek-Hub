@extends('layouts.app')

@section('title', 'My Students')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.teacher-sidebar')

    <main class="flex-1 flex flex-col overflow-hidden">

        <header class="h-16 flex-shrink-0 flex items-center justify-between px-8 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
            <div class="flex items-center gap-4 flex-1">
                <h2 class="text-lg font-bold">My Students</h2>
                <div class="max-w-sm w-full relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
                    <input type="text" placeholder="Search students..." class="w-full bg-slate-100 dark:bg-slate-800 border-none rounded-lg py-2 pl-9 pr-4 text-sm focus:ring-2 focus:ring-primary/50" />
                </div>
            </div>
            <select class="bg-slate-100 dark:bg-slate-800 border-none rounded-lg py-2 px-4 text-sm focus:ring-2 focus:ring-primary/50">
                <option>All Courses</option>
                <option>Advanced UI Systems</option>
                <option>React Hooks</option>
                <option>Figma Mastery</option>
            </select>
        </header>

        <div class="flex-1 overflow-y-auto p-8 space-y-6">

            {{-- Stats --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                $stats = [
                    ['label' => 'Total Students', 'value' => '142', 'icon' => 'group', 'color' => 'bg-primary/10 text-primary'],
                    ['label' => 'Active This Month', 'value' => '98', 'icon' => 'person_check', 'color' => 'bg-emerald-50 text-emerald-600'],
                    ['label' => 'Avg. Progress', 'value' => '68%', 'icon' => 'trending_up', 'color' => 'bg-amber-50 text-amber-600'],
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

            {{-- Students Table --}}
            <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between">
                    <h3 class="font-bold text-lg">All Students</h3>
                    <span class="text-sm text-slate-500">Showing 1–8 of 142</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-slate-50 dark:bg-slate-800/50">
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Student</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Enrolled Course</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Progress</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Sessions</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Last Active</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                            @php
                            $students = [
                                ['initials' => 'LK', 'color' => 'bg-primary/20 text-primary', 'name' => 'Lisa Kim', 'email' => 'lisa.k@yahoo.com', 'course' => 'Advanced UI Systems', 'progress' => 72, 'sessions' => 8, 'active' => '2 hours ago'],
                                ['initials' => 'JW', 'color' => 'bg-emerald-100 text-emerald-600', 'name' => 'James Wilson', 'email' => 'james.w@gmail.com', 'course' => 'React Hooks', 'progress' => 45, 'sessions' => 5, 'active' => 'Yesterday'],
                                ['initials' => 'AT', 'color' => 'bg-amber-100 text-amber-600', 'name' => 'Amira Tazi', 'email' => 'amira.t@gmail.com', 'course' => 'UI Design Basics', 'progress' => 30, 'sessions' => 3, 'active' => '3 days ago'],
                                ['initials' => 'PM', 'color' => 'bg-indigo-100 text-indigo-600', 'name' => 'Pedro Martinez', 'email' => 'pedro.m@live.es', 'course' => 'Figma Mastery', 'progress' => 90, 'sessions' => 12, 'active' => 'Today'],
                                ['initials' => 'HB', 'color' => 'bg-rose-100 text-rose-600', 'name' => 'Hannah Brown', 'email' => 'h.brown@edu.uk', 'course' => 'Advanced UI Systems', 'progress' => 15, 'sessions' => 2, 'active' => '1 week ago'],
                            ];
                            @endphp
                            @foreach($students as $student)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="size-9 rounded-full {{ $student['color'] }} flex items-center justify-center font-bold text-sm">
                                            {{ $student['initials'] }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold">{{ $student['name'] }}</p>
                                            <p class="text-xs text-slate-500">{{ $student['email'] }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">{{ $student['course'] }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <div class="w-20 h-1.5 bg-slate-100 dark:bg-slate-700 rounded-full overflow-hidden">
                                            <div class="h-full bg-primary rounded-full" style="width: {{ $student['progress'] }}%"></div>
                                        </div>
                                        <span class="text-xs font-bold">{{ $student['progress'] }}%</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium">{{ $student['sessions'] }}</td>
                                <td class="px-6 py-4 text-sm text-slate-500">{{ $student['active'] }}</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('teacher.students.show', 1) }}"
                                            class="p-1.5 text-slate-500 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-lg">visibility</span>
                                        </a>
                                        <a href="{{ route('teacher.messages.index') }}"
                                            class="p-1.5 text-slate-500 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-lg">chat_bubble</span>
                                        </a>
                                        <a href="{{ route('teacher.sessions.create') }}"
                                            class="p-1.5 text-slate-500 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-lg">add_circle</span>
                                        </a>
                                    </div>
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
