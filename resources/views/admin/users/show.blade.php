@extends('layouts.app')

@section('title', 'User Profile')

@section('content')

<div class="flex min-h-screen bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.admin-sidebar')

    <main class="flex-1 ml-64 flex flex-col">

        {{-- Header --}}
        <header class="h-16 border-b border-slate-200 dark:border-slate-800 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md flex items-center justify-between px-8 sticky top-0 z-40">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.users.index') }}" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors text-slate-500">
                    <span class="material-symbols-outlined">arrow_back</span>
                </a>
                <h2 class="text-lg font-bold">User Profile</h2>
            </div>
            <button class="px-4 py-2 bg-rose-50 text-rose-600 hover:bg-rose-100 dark:bg-rose-900/20 dark:text-rose-400 text-sm font-bold rounded-lg transition-colors flex items-center gap-2">
                <span class="material-symbols-outlined text-lg">block</span>
                Suspend Account
            </button>
        </header>

        <div class="p-8 space-y-6">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- Left: Profile Card --}}
                <div class="space-y-6">

                    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6 flex flex-col items-center text-center">
                        <div class="size-24 rounded-full bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600 font-black text-3xl mb-4">
                            LK
                        </div>
                        <h3 class="text-xl font-bold">Lisa Kim</h3>
                        <p class="text-sm text-slate-500 mt-1">lisa.k@yahoo.com</p>
                        <span class="mt-3 px-3 py-1 bg-indigo-50 dark:bg-indigo-900/20 text-indigo-600 text-xs font-bold rounded-full">
                            Student
                        </span>
                        <div class="w-full mt-6 pt-6 border-t border-slate-100 dark:border-slate-800 space-y-3 text-left">
                            <div class="flex items-center gap-3 text-sm">
                                <span class="material-symbols-outlined text-slate-400 text-lg">location_on</span>
                                <span class="text-slate-600 dark:text-slate-400">Seoul, South Korea</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <span class="material-symbols-outlined text-slate-400 text-lg">calendar_today</span>
                                <span class="text-slate-600 dark:text-slate-400">Joined Mar 14, 2024</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <span class="material-symbols-outlined text-slate-400 text-lg">family_restroom</span>
                                <span class="text-slate-600 dark:text-slate-400">Minor (Parent linked)</span>
                            </div>
                        </div>
                    </div>

                    {{-- Activity Summary --}}
                    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
                        <h4 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-4">Activity</h4>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-600 dark:text-slate-400">Enrolled Courses</span>
                                <span class="text-sm font-bold">5</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-600 dark:text-slate-400">Sessions Attended</span>
                                <span class="text-sm font-bold">38</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-600 dark:text-slate-400">Total Spent</span>
                                <span class="text-sm font-bold text-primary">$560</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-600 dark:text-slate-400">Last Active</span>
                                <span class="text-sm font-bold">2 hours ago</span>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Right: Details --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- Enrolled Courses --}}
                    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
                        <h4 class="text-base font-bold mb-4">Enrolled Courses</h4>
                        <div class="space-y-3">
                            @foreach([
                                ['title' => 'Quantum Mechanics Basics', 'teacher' => 'Dr. Sarah Miller', 'progress' => 72],
                                ['title' => 'Italian Literature', 'teacher' => 'Marco Rossi', 'progress' => 45],
                                ['title' => 'Fullstack Development', 'teacher' => 'Elena Gilbert', 'progress' => 20],
                            ] as $course)
                            <div class="p-4 bg-slate-50 dark:bg-slate-800/50 rounded-lg">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <p class="text-sm font-semibold">{{ $course['title'] }}</p>
                                        <p class="text-xs text-slate-500">by {{ $course['teacher'] }}</p>
                                    </div>
                                    <span class="text-xs font-bold text-primary">{{ $course['progress'] }}%</span>
                                </div>
                                <div class="w-full bg-slate-200 dark:bg-slate-700 rounded-full h-1.5">
                                    <div class="bg-primary h-1.5 rounded-full" style="width: {{ $course['progress'] }}%"></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Recent Payments --}}
                    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
                        <h4 class="text-base font-bold mb-4">Recent Payments</h4>
                        <div class="space-y-3">
                            @foreach([
                                ['desc' => 'Session with Dr. Sarah Miller', 'date' => 'Apr 2, 2024', 'amount' => '$45.00', 'status' => 'paid'],
                                ['desc' => 'Session with Marco Rossi', 'date' => 'Mar 28, 2024', 'amount' => '$35.00', 'status' => 'paid'],
                                ['desc' => 'Session with Elena Gilbert', 'date' => 'Mar 20, 2024', 'amount' => '$50.00', 'status' => 'refunded'],
                            ] as $payment)
                            <div class="flex items-center justify-between p-3 bg-slate-50 dark:bg-slate-800/50 rounded-lg">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-emerald-500">payments</span>
                                    <div>
                                        <p class="text-sm font-medium">{{ $payment['desc'] }}</p>
                                        <p class="text-xs text-slate-500">{{ $payment['date'] }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="text-sm font-bold">{{ $payment['amount'] }}</span>
                                    @if($payment['status'] === 'paid')
                                        <span class="text-xs text-emerald-600 bg-emerald-50 dark:bg-emerald-900/20 px-2 py-0.5 rounded-full font-bold">Paid</span>
                                    @else
                                        <span class="text-xs text-amber-600 bg-amber-50 dark:bg-amber-900/20 px-2 py-0.5 rounded-full font-bold">Refunded</span>
                                    @endif
                                </div>
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
