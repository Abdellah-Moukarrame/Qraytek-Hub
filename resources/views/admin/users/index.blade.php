@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')

<div class="flex min-h-screen bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.admin-sidebar')

    <main class="flex-1 ml-64 flex flex-col">

        {{-- Header --}}
        <header class="h-16 border-b border-slate-200 dark:border-slate-800 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md flex items-center justify-between px-8 sticky top-0 z-40">
            <div class="flex items-center gap-4 flex-1">
                <h2 class="text-lg font-bold">Users Management</h2>
                <div class="max-w-md w-full ml-4">
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">search</span>
                        <input type="text" placeholder="Search by name, email or role..." class="w-full bg-slate-100 dark:bg-slate-800 border-none rounded-lg py-2 pl-10 pr-4 text-sm focus:ring-2 focus:ring-primary/50" />
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <select class="bg-slate-100 dark:bg-slate-800 border-none rounded-lg py-2 px-4 text-sm focus:ring-2 focus:ring-primary/50">
                    <option>All Roles</option>
                    <option>Student</option>
                    <option>Parent</option>
                </select>
            </div>
        </header>

        <div class="p-8 space-y-6">

            {{-- Stats Row --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                    <div class="p-3 bg-indigo-50 dark:bg-indigo-900/20 text-indigo-600 rounded-xl">
                        <span class="material-symbols-outlined">group</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">Total Students</p>
                        <h3 class="text-2xl font-bold">45,800</h3>
                    </div>
                </div>
                <div class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                    <div class="p-3 bg-purple-50 dark:bg-purple-900/20 text-purple-600 rounded-xl">
                        <span class="material-symbols-outlined">family_restroom</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">Total Parents</p>
                        <h3 class="text-2xl font-bold">8,240</h3>
                    </div>
                </div>
                <div class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                    <div class="p-3 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 rounded-xl">
                        <span class="material-symbols-outlined">person_add</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">New This Month</p>
                        <h3 class="text-2xl font-bold">+1,340</h3>
                    </div>
                </div>
            </div>

            {{-- Users Table --}}
            <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-200 dark:border-slate-800 flex items-center justify-between">
                    <h3 class="text-lg font-bold">All Users</h3>
                    <span class="text-sm text-slate-500">Showing 1–8 of 54,040</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 dark:bg-slate-800/50">
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">User</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Enrolled Courses</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Joined</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800">

                            @php
                            $users = [
                                ['initials' => 'JW', 'color' => 'bg-primary/20 text-primary', 'name' => 'James Wilson', 'email' => 'james.w@gmail.com', 'role' => 'student', 'courses' => 3, 'joined' => 'Apr 1, 2024', 'active' => true],
                                ['initials' => 'LK', 'color' => 'bg-indigo-100 text-indigo-600', 'name' => 'Lisa Kim', 'email' => 'lisa.k@yahoo.com', 'role' => 'student', 'courses' => 5, 'joined' => 'Mar 14, 2024', 'active' => true],
                                ['initials' => 'RD', 'color' => 'bg-amber-100 text-amber-600', 'name' => 'Robert Dubois', 'email' => 'r.dubois@mail.fr', 'role' => 'parent', 'courses' => 0, 'joined' => 'Feb 28, 2024', 'active' => true],
                                ['initials' => 'AT', 'color' => 'bg-rose-100 text-rose-600', 'name' => 'Amira Tazi', 'email' => 'amira.t@gmail.com', 'role' => 'student', 'courses' => 1, 'joined' => 'Jan 10, 2024', 'active' => false],
                                ['initials' => 'PM', 'color' => 'bg-emerald-100 text-emerald-600', 'name' => 'Pedro Martinez', 'email' => 'pedro.m@live.es', 'role' => 'student', 'courses' => 7, 'joined' => 'Dec 2, 2023', 'active' => true],
                                ['initials' => 'HB', 'color' => 'bg-purple-100 text-purple-600', 'name' => 'Hannah Brown', 'email' => 'h.brown@edu.uk', 'role' => 'parent', 'courses' => 0, 'joined' => 'Nov 19, 2023', 'active' => true],
                            ];
                            @endphp

                            @foreach($users as $user)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="size-9 rounded-full {{ $user['color'] }} flex items-center justify-center font-bold text-sm">
                                            {{ $user['initials'] }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold">{{ $user['name'] }}</p>
                                            <p class="text-xs text-slate-500">{{ $user['email'] }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @if($user['role'] === 'student')
                                        <span class="px-2.5 py-1 bg-indigo-50 dark:bg-indigo-900/20 text-indigo-600 text-xs font-bold rounded-full capitalize">Student</span>
                                    @else
                                        <span class="px-2.5 py-1 bg-purple-50 dark:bg-purple-900/20 text-purple-600 text-xs font-bold rounded-full capitalize">Parent</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm font-medium">{{ $user['courses'] }}</td>
                                <td class="px-6 py-4 text-sm text-slate-500">{{ $user['joined'] }}</td>
                                <td class="px-6 py-4">
                                    @if($user['active'])
                                        <span class="flex items-center gap-1.5 text-xs font-bold text-emerald-600">
                                            <span class="size-1.5 rounded-full bg-emerald-500 inline-block"></span> Active
                                        </span>
                                    @else
                                        <span class="flex items-center gap-1.5 text-xs font-bold text-slate-400">
                                            <span class="size-1.5 rounded-full bg-slate-300 inline-block"></span> Inactive
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.users.show', 1) }}" class="p-1.5 text-slate-500 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-lg">visibility</span>
                                        </a>
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
                    <p class="text-sm text-slate-500">Showing <span class="font-semibold text-slate-700 dark:text-slate-300">1–8</span> of <span class="font-semibold text-slate-700 dark:text-slate-300">54,040</span> users</p>
                    <div class="flex items-center gap-2">
                        <button class="p-2 rounded-lg text-slate-400 transition-colors disabled:opacity-40" disabled>
                            <span class="material-symbols-outlined text-lg">chevron_left</span>
                        </button>
                        <button class="size-9 rounded-lg bg-primary text-white text-sm font-bold">1</button>
                        <button class="size-9 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 text-sm font-medium transition-colors">2</button>
                        <button class="size-9 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 text-sm font-medium transition-colors">3</button>
                        <span class="text-slate-400 text-sm">...</span>
                        <button class="size-9 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 text-sm font-medium transition-colors">6,755</button>
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
