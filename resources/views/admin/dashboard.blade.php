@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<div class="flex min-h-screen bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    {{-- Sidebar --}}
    @include('layouts.sidebars.admin-sidebar')

    {{-- Main Content --}}
    <main class="flex-1 ml-64 flex flex-col">

        {{-- Header --}}
        <header class="h-16 border-b border-slate-200 dark:border-slate-800 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md flex items-center justify-between px-8 sticky top-0 z-40">
            <div class="flex items-center gap-4 flex-1">
                <h2 class="text-lg font-bold">Super Admin Overview</h2>
                <div class="max-w-md w-full ml-4">
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">search</span>
                        <input
                            type="text"
                            placeholder="Search teachers, students, or transactions..."
                            class="w-full bg-slate-100 dark:bg-slate-800 border-none rounded-lg py-2 pl-10 pr-4 text-sm focus:ring-2 focus:ring-primary/50"
                        />
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <button class="p-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg relative">
                    <span class="material-symbols-outlined">notifications</span>
                    <span class="absolute top-2 right-2 size-2 bg-red-500 rounded-full border-2 border-white dark:border-slate-900"></span>
                </button>
                <button class="p-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg">
                    <span class="material-symbols-outlined">calendar_today</span>
                </button>
                <div class="h-8 w-[1px] bg-slate-200 dark:bg-slate-800 mx-2"></div>
                <button class="flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg text-sm font-medium">
                    <span class="material-symbols-outlined text-lg">add</span>
                    <span>Invite User</span>
                </button>
            </div>
        </header>

        {{-- Dashboard Body --}}
        <div class="p-8 space-y-8">

            {{-- KPI Stats Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                {{-- Total Teachers --}}
                <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-2 bg-blue-50 dark:bg-blue-900/20 text-blue-600 rounded-lg">
                            <span class="material-symbols-outlined">person_pin_circle</span>
                        </div>
                        <span class="text-xs font-bold text-emerald-500 bg-emerald-50 dark:bg-emerald-900/20 px-2 py-1 rounded">+5.2%</span>
                    </div>
                    <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Teachers</p>
                    <h3 class="text-2xl font-bold mt-1">1,240</h3>
                </div>

                {{-- Active Students --}}
                <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-2 bg-indigo-50 dark:bg-indigo-900/20 text-indigo-600 rounded-lg">
                            <span class="material-symbols-outlined">group</span>
                        </div>
                        <span class="text-xs font-bold text-emerald-500 bg-emerald-50 dark:bg-emerald-900/20 px-2 py-1 rounded">+12.4%</span>
                    </div>
                    <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Active Students</p>
                    <h3 class="text-2xl font-bold mt-1">45,800</h3>
                </div>

                {{-- Monthly Revenue --}}
                <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-2 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 rounded-lg">
                            <span class="material-symbols-outlined">payments</span>
                        </div>
                        <span class="text-xs font-bold text-emerald-500 bg-emerald-50 dark:bg-emerald-900/20 px-2 py-1 rounded">+8.1%</span>
                    </div>
                    <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Monthly Revenue</p>
                    <h3 class="text-2xl font-bold mt-1">$128,400</h3>
                </div>

                {{-- Pending Validations --}}
                <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-2 bg-amber-50 dark:bg-amber-900/20 text-amber-600 rounded-lg">
                            <span class="material-symbols-outlined">pending_actions</span>
                        </div>
                        <span class="text-xs font-bold text-rose-500 bg-rose-50 dark:bg-rose-900/20 px-2 py-1 rounded">-2%</span>
                    </div>
                    <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Pending Validations</p>
                    <h3 class="text-2xl font-bold mt-1">18</h3>
                </div>

            </div>

            {{-- Main Dashboard Layout --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Left Column --}}
                <div class="lg:col-span-2 space-y-8">

                    {{-- Growth Trends Chart --}}
                    <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h3 class="text-lg font-bold">Platform Growth Trends</h3>
                                <p class="text-sm text-slate-500">Student & Teacher signup volume over the last 6 months</p>
                            </div>
                            <div class="flex gap-2">
                                <span class="flex items-center gap-1.5 text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">
                                    <span class="size-2 rounded-full bg-primary inline-block"></span> Teachers
                                </span>
                                <span class="flex items-center gap-1.5 text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">
                                    <span class="size-2 rounded-full bg-indigo-300 inline-block"></span> Students
                                </span>
                            </div>
                        </div>
                        <div class="h-[280px] w-full relative">
                            <svg class="w-full h-full" viewBox="0 0 500 200" preserveAspectRatio="none">
                                <defs>
                                    <linearGradient id="chartGradient" x1="0" x2="0" y1="0" y2="1">
                                        <stop offset="0%" stop-color="#137fec" stop-opacity="0.2"/>
                                        <stop offset="100%" stop-color="#137fec" stop-opacity="0"/>
                                    </linearGradient>
                                </defs>
                                <path d="M0 160 Q 50 140 100 150 T 200 100 T 300 120 T 400 40 T 500 20 V 200 H 0 Z" fill="url(#chartGradient)"/>
                                <path d="M0 160 Q 50 140 100 150 T 200 100 T 300 120 T 400 40 T 500 20" fill="none" stroke="#137fec" stroke-width="3" stroke-linecap="round"/>
                                <path d="M0 180 Q 50 175 100 178 T 200 150 T 300 160 T 400 110 T 500 95" fill="none" stroke="#a5b4fc" stroke-width="2" stroke-dasharray="5,5" stroke-linecap="round"/>
                            </svg>
                            <div class="absolute bottom-0 w-full flex justify-between text-[10px] font-bold text-slate-400 uppercase tracking-widest pt-4 border-t border-slate-100 dark:border-slate-800">
                                <span>Jan</span>
                                <span>Feb</span>
                                <span>Mar</span>
                                <span>Apr</span>
                                <span>May</span>
                                <span>Jun</span>
                            </div>
                        </div>
                    </div>

                    {{-- Teacher Validation Requests Table --}}
                    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                        <div class="p-6 border-b border-slate-200 dark:border-slate-800 flex items-center justify-between">
                            <h3 class="text-lg font-bold">Teacher Validation Requests</h3>
                            <a href="{{ route('admin.teachers.index') }}" class="text-sm font-semibold text-primary hover:underline">
                                View all requests
                            </a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-slate-50 dark:bg-slate-800/50">
                                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Teacher</th>
                                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Subject</th>
                                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Experience</th>
                                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Applied</th>
                                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">

                                    {{-- Row 1 --}}
                                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="size-9 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-sm">
                                                    SM
                                                </div>
                                                <div>
                                                    <p class="text-sm font-semibold">Dr. Sarah Miller</p>
                                                    <p class="text-xs text-slate-500">sarah.m@edu.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm">Advanced Physics</td>
                                        <td class="px-6 py-4 text-sm">8 Years</td>
                                        <td class="px-6 py-4 text-sm text-slate-500">2h ago</td>
                                        <td class="px-6 py-4 text-right space-x-2">
                                            <button class="px-3 py-1.5 bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold rounded-lg transition-colors">Approve</button>
                                            <button class="px-3 py-1.5 bg-rose-50 text-rose-600 hover:bg-rose-100 dark:bg-rose-900/20 dark:text-rose-400 text-xs font-bold rounded-lg transition-colors">Reject</button>
                                        </td>
                                    </tr>

                                    {{-- Row 2 --}}
                                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="size-9 rounded-full bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600 font-bold text-sm">
                                                    MR
                                                </div>
                                                <div>
                                                    <p class="text-sm font-semibold">Marco Rossi</p>
                                                    <p class="text-xs text-slate-500">m.rossi@language.it</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm">Italian Literature</td>
                                        <td class="px-6 py-4 text-sm">12 Years</td>
                                        <td class="px-6 py-4 text-sm text-slate-500">5h ago</td>
                                        <td class="px-6 py-4 text-right space-x-2">
                                            <button class="px-3 py-1.5 bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold rounded-lg transition-colors">Approve</button>
                                            <button class="px-3 py-1.5 bg-rose-50 text-rose-600 hover:bg-rose-100 dark:bg-rose-900/20 dark:text-rose-400 text-xs font-bold rounded-lg transition-colors">Reject</button>
                                        </td>
                                    </tr>

                                    {{-- Row 3 --}}
                                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="size-9 rounded-full bg-emerald-100 dark:bg-emerald-900/30 flex items-center justify-center text-emerald-600 font-bold text-sm">
                                                    EG
                                                </div>
                                                <div>
                                                    <p class="text-sm font-semibold">Elena Gilbert</p>
                                                    <p class="text-xs text-slate-500">egilbert@web.dev</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm">Fullstack Development</td>
                                        <td class="px-6 py-4 text-sm">4 Years</td>
                                        <td class="px-6 py-4 text-sm text-slate-500">Yesterday</td>
                                        <td class="px-6 py-4 text-right space-x-2">
                                            <button class="px-3 py-1.5 bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold rounded-lg transition-colors">Approve</button>
                                            <button class="px-3 py-1.5 bg-rose-50 text-rose-600 hover:bg-rose-100 dark:bg-rose-900/20 dark:text-rose-400 text-xs font-bold rounded-lg transition-colors">Reject</button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                {{-- Right Column --}}
                <div class="space-y-8">

                    {{-- System Monitoring --}}
                    <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-6">System Monitoring</h3>
                        <div class="space-y-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="size-2 rounded-full bg-emerald-500 animate-pulse"></div>
                                    <p class="text-sm font-medium">Main Server (AWS-East)</p>
                                </div>
                                <span class="text-xs font-bold text-emerald-500">99.9%</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="size-2 rounded-full bg-emerald-500"></div>
                                    <p class="text-sm font-medium">Payment Gateway API</p>
                                </div>
                                <span class="text-xs font-bold text-emerald-500">Online</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="size-2 rounded-full bg-amber-500"></div>
                                    <p class="text-sm font-medium">DB Write Latency</p>
                                </div>
                                <span class="text-xs font-bold text-amber-500">42ms</span>
                            </div>
                        </div>
                        <div class="mt-8 pt-6 border-t border-slate-100 dark:border-slate-800 text-center">
                            <button class="text-xs font-bold text-primary flex items-center justify-center gap-1 w-full">
                                <span class="material-symbols-outlined text-sm">monitoring</span>
                                View Infrastructure Metrics
                            </button>
                        </div>
                    </div>

                    {{-- Live Activity Feed --}}
                    <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-6">Live Activity Feed</h3>
                        <div class="space-y-6 relative before:absolute before:inset-0 before:left-3 before:border-l before:border-slate-100 dark:before:border-slate-800">

                            <div class="relative pl-8">
                                <div class="absolute left-0 top-1 size-6 rounded-full bg-primary/20 flex items-center justify-center text-primary -ml-3">
                                    <span class="material-symbols-outlined text-xs">person_add</span>
                                </div>
                                <p class="text-xs text-slate-500 font-medium">10 mins ago</p>
                                <p class="text-sm font-medium mt-0.5"><span class="font-bold text-slate-900 dark:text-white">James Wilson</span> signed up as a student.</p>
                            </div>

                            <div class="relative pl-8">
                                <div class="absolute left-0 top-1 size-6 rounded-full bg-emerald-500/20 flex items-center justify-center text-emerald-600 -ml-3">
                                    <span class="material-symbols-outlined text-xs">payments</span>
                                </div>
                                <p class="text-xs text-slate-500 font-medium">45 mins ago</p>
                                <p class="text-sm font-medium mt-0.5"><span class="font-bold text-slate-900 dark:text-white">$45.00</span> payment received from <span class="text-primary font-bold">@lisa_k</span>.</p>
                            </div>

                            <div class="relative pl-8">
                                <div class="absolute left-0 top-1 size-6 rounded-full bg-amber-500/20 flex items-center justify-center text-amber-600 -ml-3">
                                    <span class="material-symbols-outlined text-xs">assignment_turned_in</span>
                                </div>
                                <p class="text-xs text-slate-500 font-medium">2 hours ago</p>
                                <p class="text-sm font-medium mt-0.5"><span class="font-bold text-slate-900 dark:text-white">New Course Draft</span> submitted for review by Prof. Oak.</p>
                            </div>

                            <div class="relative pl-8">
                                <div class="absolute left-0 top-1 size-6 rounded-full bg-primary/20 flex items-center justify-center text-primary -ml-3">
                                    <span class="material-symbols-outlined text-xs">campaign</span>
                                </div>
                                <p class="text-xs text-slate-500 font-medium">3 hours ago</p>
                                <p class="text-sm font-medium mt-0.5">Global system announcement published.</p>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>

        {{-- Footer --}}
        <footer class="mt-auto p-8 flex justify-between items-center text-slate-400 text-xs font-medium border-t border-slate-200 dark:border-slate-800">
            <p>© {{ date('Y') }} EduMaster E-learning Systems.</p>
            <div class="flex gap-6">
                <a href="#" class="hover:text-primary transition-colors">Documentation</a>
                <a href="#" class="hover:text-primary transition-colors">Support</a>
                <a href="#" class="hover:text-primary transition-colors">API Status</a>
            </div>
        </footer>

    </main>

</div>

@endsection
