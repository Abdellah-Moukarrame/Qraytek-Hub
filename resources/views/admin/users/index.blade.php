@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')

    <div class="flex min-h-screen bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

        @include('layouts.sidebars.admin-sidebar')

        <main class="flex-1 ml-64 flex flex-col">

            {{-- Header --}}
            <header
                class="h-16 border-b border-slate-200 dark:border-slate-800 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md flex items-center justify-between px-8 sticky top-0 z-40">
                <div class="flex items-center gap-4 flex-1">
                    <h2 class="text-lg font-bold">Users Management</h2>
                    <div class="max-w-md w-full ml-4">
                        <div class="relative">
                            <span
                                class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">search</span>
                            <input type="text" placeholder="Search by name, email or role..."
                                class="w-full bg-slate-100 dark:bg-slate-800 border-none rounded-lg py-2 pl-10 pr-4 text-sm focus:ring-2 focus:ring-primary/50" />
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <select
                        class="bg-slate-100 dark:bg-slate-800 border-none rounded-lg py-2 px-4 text-sm focus:ring-2 focus:ring-primary/50">
                        <option>All Roles</option>
                        <option>Student</option>
                        <option>Parent</option>
                    </select>
                </div>
            </header>

            <div class="p-8 space-y-6">

                {{-- Stats Row --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div
                        class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                        <div class="p-3 bg-indigo-50 dark:bg-indigo-900/20 text-indigo-600 rounded-xl">
                            <span class="material-symbols-outlined">group</span>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 font-medium">Total Students</p>
                            <h3 class="text-2xl font-bold">{{$totalStudents}}</h3>
                        </div>
                    </div>
                </div>
                {{-- Users Table --}}
                <div
                    class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 dark:bg-slate-800/50">
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">User
                                    </th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Role
                                    </th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Enrolled
                                        Courses</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Joined
                                    </th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Status
                                    </th>
                                    <th
                                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-800">



                                @foreach ($Students as $student)
                                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">

                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">

                                                <div
                                                    class="size-9 rounded-full bg-primary/20 text-primary flex items-center justify-center font-bold text-sm">
                                                    {{ strtoupper(substr($student->personne->name, 0, 2)) }}
                                                </div>

                                                <div>
                                                    <p class="text-sm font-semibold">
                                                        {{ $student->personne->name }}
                                                    </p>

                                                    <p class="text-xs text-slate-500">
                                                        {{ $student->personne->email }}
                                                    </p>
                                                </div>

                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <span
                                                class="px-2.5 py-1 bg-indigo-50 dark:bg-indigo-900/20 text-indigo-600 text-xs font-bold rounded-full capitalize">
                                                Student
                                            </span>
                                        </td>

                                        <td class="px-6 py-4 text-sm font-medium">
                                            {{ $student->bookings->count() }}
                                        </td>

                                        <td class="px-6 py-4 text-sm text-slate-500">
                                            {{ $student->created_at->format('M d, Y') }}
                                        </td>

                                        <td class="px-6 py-4">

                                            <span class="flex items-center gap-1.5 text-xs font-bold text-emerald-600">
                                                <span class="size-1.5 rounded-full bg-emerald-500 inline-block"></span>
                                                Active
                                            </span>

                                        </td>

                                        <td class="px-6 py-4 text-right">

                                            <div class="flex items-center justify-end gap-2">

                                                <a href="{{ route('admin.users.show', $student->id) }}"
                                                    class="p-1.5 text-slate-500 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                                    <span class="material-symbols-outlined text-lg">visibility</span>
                                                </a>

                                            </div>

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{$Students->links()}}
                    </div>


                </div>

            </div>
        </main>
    </div>

@endsection
