@extends('layouts.app')

@section('title', 'Manage Teachers')

@section('content')

    <div class="flex min-h-screen bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

        @include('layouts.sidebars.admin-sidebar')

        <main class="flex-1 ml-64 flex flex-col">

            {{-- Header --}}
            <header
                class="h-16 border-b border-slate-200 dark:border-slate-800 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md flex items-center justify-between px-8 sticky top-0 z-40">
                <div class="flex items-center gap-4 flex-1">
                    <h2 class="text-lg font-bold">Teachers Management</h2>
                    <div class="max-w-md w-full ml-4">
                        <div class="relative">
                            <span
                                class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">search</span>
                            <input type="text" placeholder="Search teachers by name, subject..."
                                class="w-full bg-slate-100 dark:bg-slate-800 border-none rounded-lg py-2 pl-10 pr-4 text-sm focus:ring-2 focus:ring-primary/50" />
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    {{-- Filter --}}
                    <select
                        class="bg-slate-100 dark:bg-slate-800 border-none rounded-lg py-2 px-4 text-sm focus:ring-2 focus:ring-primary/50">
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
                    <div
                        class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                        <div class="p-3 bg-blue-50 dark:bg-blue-900/20 text-blue-600 rounded-xl">
                            <span class="material-symbols-outlined">person_pin_circle</span>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 font-medium">Total Teachers</p>
                            <h3 class="text-2xl font-bold">{{$totalTeachers}}</h3>
                        </div>
                    </div>
                    <div
                        class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                        <div class="p-3 bg-amber-50 dark:bg-amber-900/20 text-amber-600 rounded-xl">
                            <span class="material-symbols-outlined">pending_actions</span>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 font-medium">Pending Validation</p>
                            <h3 class="text-2xl font-bold">{{$pendingTeachers}}</h3>
                        </div>
                    </div>
                    <div
                        class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                        <div class="p-3 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 rounded-xl">
                            <span class="material-symbols-outlined">verified</span>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 font-medium">Approved Teachers</p>
                            <h3 class="text-2xl font-bold">{{$approvedTeachers}}</h3>
                        </div>
                    </div>
                </div>

                {{-- Teachers Table --}}
                <div
                    class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-200 dark:border-slate-800 flex items-center justify-between">
                        <h3 class="text-lg font-bold">All Teachers</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 dark:bg-slate-800/50">
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Teacher
                                    </th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Subject
                                    </th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Students
                                    </th>
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



                                @foreach ($teachers as $teacher)
                                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="size-9 rounded-full {{ $teacher['color'] }} flex items-center justify-center font-bold text-sm">
                                                    {{ $teacher['initials'] }}
                                                </div>
                                                <div>
                                                    <p class="text-sm font-semibold">{{ $teacher->personne->name }}</p>
                                                    <p class="text-xs text-slate-500">{{ $teacher->personne->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm">{{ $teacher['subject'] }}</td>
                                        <td class="px-6 py-4 text-sm font-medium">{{ $teacher['students'] }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-500">{{ $teacher->personne->created_at }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($teacher['status'] === 'approved')
                                                <span
                                                    class="px-2.5 py-1 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 text-xs font-bold rounded-full">Approved</span>
                                            @elseif($teacher['status'] === 'pending')
                                                <span
                                                    class="px-2.5 py-1 bg-amber-50 dark:bg-amber-900/20 text-amber-600 text-xs font-bold rounded-full">Pending</span>
                                            @else
                                                <span
                                                    class="px-2.5 py-1 bg-rose-50 dark:bg-rose-900/20 text-rose-600 text-xs font-bold rounded-full">Rejected</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex items-center justify-end gap-2">
                                                <a href="{{ route('admin.teachers.show', $teacher->id) }}"
                                                    class="p-1.5 text-slate-500 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                                    <span class="material-symbols-outlined text-lg">visibility</span>
                                                </a>
                                                @if ($teacher['status'] === 'pending')
                                                    <div class="flex items-center gap-2">

                                                        <form action="{{ route('admin.teachers.approve', $teacher->id) }}"
                                                            method="POST">
                                                            @csrf

                                                            <button type="submit"
                                                                class="px-3 py-1.5 bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold rounded-lg transition-colors">
                                                                Approve
                                                            </button>
                                                        </form>

                                                        <form action="{{ route('admin.teachers.reject', $teacher->id) }}"
                                                            method="POST">
                                                            @csrf

                                                            <button type="submit"
                                                                class="px-3 py-1.5 bg-rose-50 text-rose-600 hover:bg-rose-100 text-xs font-bold rounded-lg transition-colors">
                                                                Reject
                                                            </button>
                                                        </form>

                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    {{ $teachers->links() }}
                </div>

            </div>
        </main>
    </div>

@endsection
