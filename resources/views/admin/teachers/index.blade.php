@extends('layouts.app')

@section('title', 'Manage Teachers')

@section('content')

<div class="flex min-h-screen bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.admin-sidebar')

    <main class="flex-1 ml-64 flex flex-col">

        {{-- Header --}}
        <header class="h-16 border-b border-slate-200 dark:border-slate-800 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md flex items-center justify-between px-8 sticky top-0 z-40">
            <div class="flex items-center gap-4 flex-1">
                <h2 class="text-lg font-bold">Teachers Management</h2>
                <div class="max-w-md w-full ml-4">
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">search</span>
                        <input type="text" placeholder="Search teachers by name, subject..." class="w-full bg-slate-100 dark:bg-slate-800 border-none rounded-lg py-2 pl-10 pr-4 text-sm focus:ring-2 focus:ring-primary/50" />
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-3">
                {{-- Filter --}}
                <select class="bg-slate-100 dark:bg-slate-800 border-none rounded-lg py-2 px-4 text-sm focus:ring-2 focus:ring-primary/50">
                    <option>All Status</option>
                    <option>Pending</option>
                    <option>Approved</option>
                    <option>Rejected</option>
                </select>
            </div>
        </header>

        <div class="p-8 space-y-6">

            {{-- Stats Row --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                    <div class="p-3 bg-blue-50 dark:bg-blue-900/20 text-blue-600 rounded-xl">
                        <span class="material-symbols-outlined">person_pin_circle</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">Total Teachers</p>
                        <h3 class="text-2xl font-bold">1,240</h3>
                    </div>
                </div>
                <div class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                    <div class="p-3 bg-amber-50 dark:bg-amber-900/20 text-amber-600 rounded-xl">
                        <span class="material-symbols-outlined">pending_actions</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">Pending Validation</p>
                        <h3 class="text-2xl font-bold">18</h3>
                    </div>
                </div>
                <div class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                    <div class="p-3 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 rounded-xl">
                        <span class="material-symbols-outlined">verified</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">Approved Teachers</p>
                        <h3 class="text-2xl font-bold">1,198</h3>
                    </div>
                </div>
            </div>

            {{-- Teachers Table --}}
            <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-200 dark:border-slate-800 flex items-center justify-between">
                    <h3 class="text-lg font-bold">All Teachers</h3>
                    <span class="text-sm text-slate-500">Showing 1–8 of 1,240</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 dark:bg-slate-800/50">
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Teacher</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Subject</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Students</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Joined</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800">

                            @php
                            $teachers = [
                                ['initials' => 'SM', 'color' => 'bg-primary/20 text-primary', 'name' => 'Dr. Sarah Miller', 'email' => 'sarah.m@edu.com', 'subject' => 'Advanced Physics', 'students' => 142, 'joined' => 'Jan 12, 2024', 'status' => 'approved'],
                                ['initials' => 'MR', 'color' => 'bg-indigo-100 text-indigo-600', 'name' => 'Marco Rossi', 'email' => 'm.rossi@language.it', 'subject' => 'Italian Literature', 'students' => 89, 'joined' => 'Feb 3, 2024', 'status' => 'approved'],
                                ['initials' => 'EG', 'color' => 'bg-emerald-100 text-emerald-600', 'name' => 'Elena Gilbert', 'email' => 'egilbert@web.dev', 'subject' => 'Fullstack Development', 'students' => 0, 'joined' => 'Mar 28, 2024', 'status' => 'pending'],
                                ['initials' => 'JK', 'color' => 'bg-amber-100 text-amber-600', 'name' => 'James Kowalski', 'email' => 'j.kowalski@math.pl', 'subject' => 'Mathematics', 'students' => 0, 'joined' => 'Apr 1, 2024', 'status' => 'pending'],
                                ['initials' => 'AL', 'color' => 'bg-rose-100 text-rose-600', 'name' => 'Amina Larbi', 'email' => 'amina.l@arabic.ma', 'subject' => 'Arabic Language', 'students' => 210, 'joined' => 'Dec 5, 2023', 'status' => 'approved'],
                                ['initials' => 'TC', 'color' => 'bg-purple-100 text-purple-600', 'name' => 'Thomas Chen', 'email' => 'thomas.c@science.us', 'subject' => 'Chemistry', 'students' => 0, 'joined' => 'Apr 2, 2024', 'status' => 'rejected'],
                            ];
                            @endphp

                            @foreach($teachers as $teacher)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="size-9 rounded-full {{ $teacher['color'] }} flex items-center justify-center font-bold text-sm">
                                            {{ $teacher['initials'] }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold">{{ $teacher['name'] }}</p>
                                            <p class="text-xs text-slate-500">{{ $teacher['email'] }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm">{{ $teacher['subject'] }}</td>
                                <td class="px-6 py-4 text-sm font-medium">{{ $teacher['students'] }}</td>
                                <td class="px-6 py-4 text-sm text-slate-500">{{ $teacher['joined'] }}</td>
                                <td class="px-6 py-4">
                                    @if($teacher['status'] === 'approved')
                                        <span class="px-2.5 py-1 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 text-xs font-bold rounded-full">Approved</span>
                                    @elseif($teacher['status'] === 'pending')
                                        <span class="px-2.5 py-1 bg-amber-50 dark:bg-amber-900/20 text-amber-600 text-xs font-bold rounded-full">Pending</span>
                                    @else
                                        <span class="px-2.5 py-1 bg-rose-50 dark:bg-rose-900/20 text-rose-600 text-xs font-bold rounded-full">Rejected</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.teachers.show', 1) }}" class="p-1.5 text-slate-500 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-lg">visibility</span>
                                        </a>
                                        @if($teacher['status'] === 'pending')
                                        <button class="px-3 py-1.5 bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold rounded-lg transition-colors">Approve</button>
                                        <button class="px-3 py-1.5 bg-rose-50 text-rose-600 hover:bg-rose-100 text-xs font-bold rounded-lg transition-colors">Reject</button>
                                        @endif
                                        <button class="p-1.5 text-slate-500 hover:text-rose-500 hover:bg-rose-50 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-lg">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="p-6 border-t border-slate-200 dark:border-slate-800 flex items-center justify-between">
                    <p class="text-sm text-slate-500">Showing <span class="font-semibold text-slate-700 dark:text-slate-300">1–8</span> of <span class="font-semibold text-slate-700 dark:text-slate-300">1,240</span> teachers</p>
                    <div class="flex items-center gap-2">
                        <button class="p-2 rounded-lg text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors disabled:opacity-40" disabled>
                            <span class="material-symbols-outlined text-lg">chevron_left</span>
                        </button>
                        <button class="size-9 rounded-lg bg-primary text-white text-sm font-bold">1</button>
                        <button class="size-9 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 text-sm font-medium transition-colors">2</button>
                        <button class="size-9 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 text-sm font-medium transition-colors">3</button>
                        <span class="text-slate-400 text-sm">...</span>
                        <button class="size-9 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 text-sm font-medium transition-colors">155</button>
                        <button class="p-2 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                            <span class="material-symbols-outlined text-lg">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>

@endsection
