@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    {{-- Sidebar --}}
    @include('layouts.sidebars.student-sidebar')

    {{-- Main Content --}}
    <main class="flex-1 flex flex-col overflow-hidden">

        {{-- Header --}}
        <header class="h-16 flex-shrink-0 flex items-center justify-between px-8 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
            <div class="flex-1 max-w-xl">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                        <span class="material-symbols-outlined">search</span>
                    </span>
                    <input
                        type="text"
                        placeholder="Search for courses, tutors or lessons..."
                        class="block w-full pl-10 pr-3 py-2 border-none bg-slate-100 dark:bg-slate-800 rounded-lg focus:ring-2 focus:ring-primary text-sm transition-all"
                    />
                </div>
            </div>
            <div class="flex items-center gap-4 ml-8">
                <button class="relative p-2 text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg">
                    <span class="material-symbols-outlined">notifications</span>
                    <span class="absolute top-2 right-2 size-2 bg-red-500 rounded-full border-2 border-white dark:border-background-dark"></span>
                </button>
                <a href="{{ route('student.messages.index') }}" class="p-2 text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg">
                    <span class="material-symbols-outlined">chat_bubble</span>
                </a>
                <div class="h-8 w-px bg-slate-200 dark:bg-slate-700 mx-2"></div>
                <a href="{{ route('student.bookings.create') }}"
                    class="flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-colors">
                    <span class="material-symbols-outlined text-lg">add_circle</span>
                    <span>New Booking</span>
                </a>
            </div>
        </header>

        {{-- Content --}}
        <div class="flex-1 overflow-y-auto p-8">

            {{-- Welcome Section --}}
            <section class="mb-10">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div>
                        <h1 class="text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                            Hi, {{ auth()->user()->name ?? 'Student' }}! 👋
                        </h1>
                        <p class="text-slate-500 dark:text-slate-400 mt-1">
                            Ready for your next lesson? You've completed
                            <span class="text-primary font-bold">12 hours</span> of study this week.
                        </p>
                    </div>
                    <div class="bg-white dark:bg-slate-800 p-4 rounded-xl border border-slate-200 dark:border-slate-700 flex gap-6">
                        <div class="text-center">
                            <p class="text-xs text-slate-400 uppercase font-bold tracking-widest">Ongoing</p>
                            <p class="text-xl font-bold">4</p>
                        </div>
                        <div class="w-px bg-slate-200 dark:bg-slate-700"></div>
                        <div class="text-center">
                            <p class="text-xs text-slate-400 uppercase font-bold tracking-widest">Completed</p>
                            <p class="text-xl font-bold">28</p>
                        </div>
                        <div class="w-px bg-slate-200 dark:bg-slate-700"></div>
                        <div class="text-center">
                            <p class="text-xs text-slate-400 uppercase font-bold tracking-widest">Certificates</p>
                            <p class="text-xl font-bold text-primary">12</p>
                        </div>
                    </div>
                </div>
            </section>

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

                {{-- Left / Center --}}
                <div class="xl:col-span-2 space-y-10">

                    {{-- Continue Learning --}}
                    <section>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold">Continue Learning</h3>
                            <a href="{{ route('student.courses.index') }}" class="text-primary text-sm font-semibold hover:underline">View all</a>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            {{-- Course Card 1 --}}
                            <div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 group hover:shadow-lg transition-shadow">
                                <div class="h-32 bg-gradient-to-br from-primary/30 to-indigo-400/30 relative flex items-center justify-center">
                                    <span class="material-symbols-outlined text-5xl text-primary/40">design_services</span>
                                    <div class="absolute bottom-3 left-3 bg-white/90 dark:bg-slate-900/90 backdrop-blur px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider">Design</div>
                                </div>
                                <div class="p-4">
                                    <h4 class="font-bold text-slate-900 dark:text-white mb-1">Advanced UI Systems</h4>
                                    <p class="text-xs text-slate-500 mb-4">Instructor: Sarah Miller</p>
                                    <div class="space-y-2">
                                        <div class="flex justify-between text-xs font-bold">
                                            <span class="text-slate-400">Progress</span>
                                            <span class="text-primary">85%</span>
                                        </div>
                                        <div class="w-full h-2 bg-slate-100 dark:bg-slate-700 rounded-full overflow-hidden">
                                            <div class="h-full bg-primary rounded-full" style="width: 85%"></div>
                                        </div>
                                    </div>
                                    <a href="{{ route('student.courses.show', 1) }}"
                                        class="mt-4 block w-full py-2 bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-white rounded-lg text-sm font-bold hover:bg-primary hover:text-white transition-all text-center">
                                        Resume Lesson
                                    </a>
                                </div>
                            </div>

                            {{-- Course Card 2 --}}
                            <div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 group hover:shadow-lg transition-shadow">
                                <div class="h-32 bg-gradient-to-br from-emerald-300/30 to-teal-400/30 relative flex items-center justify-center">
                                    <span class="material-symbols-outlined text-5xl text-emerald-400/40">code</span>
                                    <div class="absolute bottom-3 left-3 bg-white/90 dark:bg-slate-900/90 backdrop-blur px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider">Development</div>
                                </div>
                                <div class="p-4">
                                    <h4 class="font-bold text-slate-900 dark:text-white mb-1">React Advanced Hooks</h4>
                                    <p class="text-xs text-slate-500 mb-4">Instructor: David Chen</p>
                                    <div class="space-y-2">
                                        <div class="flex justify-between text-xs font-bold">
                                            <span class="text-slate-400">Progress</span>
                                            <span class="text-primary">40%</span>
                                        </div>
                                        <div class="w-full h-2 bg-slate-100 dark:bg-slate-700 rounded-full overflow-hidden">
                                            <div class="h-full bg-primary rounded-full" style="width: 40%"></div>
                                        </div>
                                    </div>
                                    <a href="{{ route('student.courses.show', 2) }}"
                                        class="mt-4 block w-full py-2 bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-white rounded-lg text-sm font-bold hover:bg-primary hover:text-white transition-all text-center">
                                        Resume Lesson
                                    </a>
                                </div>
                            </div>

                        </div>
                    </section>

                    {{-- Recommended Courses --}}
                    <section>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold">Recommended for You</h3>
                            <div class="flex gap-2">
                                <button class="size-8 rounded-full border border-slate-200 dark:border-slate-700 flex items-center justify-center hover:bg-slate-50 dark:hover:bg-slate-800">
                                    <span class="material-symbols-outlined text-lg">chevron_left</span>
                                </button>
                                <button class="size-8 rounded-full border border-slate-200 dark:border-slate-700 flex items-center justify-center hover:bg-slate-50 dark:hover:bg-slate-800">
                                    <span class="material-symbols-outlined text-lg">chevron_right</span>
                                </button>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                            @php
                            $recommended = [
                                ['title' => 'Digital Marketing 101', 'rating' => '4.8', 'reviews' => '1.2k', 'color' => 'from-orange-300/40 to-rose-300/40', 'icon' => 'campaign'],
                                ['title' => 'Data Science with Python', 'rating' => '4.9', 'reviews' => '850', 'color' => 'from-blue-300/40 to-purple-300/40', 'icon' => 'analytics'],
                                ['title' => 'Product Photography', 'rating' => '4.7', 'reviews' => '2.4k', 'color' => 'from-amber-300/40 to-yellow-200/40', 'icon' => 'camera_alt'],
                            ];
                            @endphp

                            @foreach($recommended as $course)
                            <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-3 hover:border-primary transition-colors cursor-pointer">
                                <div class="h-24 w-full rounded-lg bg-gradient-to-br {{ $course['color'] }} mb-3 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-4xl text-slate-400/60">{{ $course['icon'] }}</span>
                                </div>
                                <h5 class="font-bold text-sm text-slate-900 dark:text-white line-clamp-1">{{ $course['title'] }}</h5>
                                <div class="flex items-center gap-1 mt-2">
                                    <span class="material-symbols-outlined text-yellow-400 text-xs">star</span>
                                    <span class="text-[10px] font-bold">{{ $course['rating'] }}</span>
                                    <span class="text-[10px] text-slate-400">({{ $course['reviews'] }})</span>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </section>

                </div>

                {{-- Right Sidebar --}}
                <div class="space-y-6">

                    {{-- Upcoming Lessons --}}
                    <section class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 p-6">
                        <h3 class="text-lg font-bold mb-6 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">event_upcoming</span>
                            Upcoming Lessons
                        </h3>
                        <div class="space-y-4">

                            @php
                            $lessons = [
                                ['initials' => 'SM', 'color' => 'bg-primary/20 text-primary', 'name' => 'Sarah Miller', 'subject' => 'UI Design Mentorship', 'day' => 'Today', 'time' => '14:00 PM', 'joinable' => true],
                                ['initials' => 'DC', 'color' => 'bg-emerald-100 text-emerald-600', 'name' => 'David Chen', 'subject' => 'React Architecture', 'day' => 'Tomorrow', 'time' => '10:30 AM', 'joinable' => false],
                                ['initials' => 'ER', 'color' => 'bg-amber-100 text-amber-600', 'name' => 'Elena Rodriguez', 'subject' => 'Spanish Advanced', 'day' => 'Oct 24', 'time' => '09:00 AM', 'joinable' => false],
                            ];
                            @endphp

                            @foreach($lessons as $lesson)
                            <div class="p-4 rounded-xl {{ $lesson['joinable'] ? 'bg-slate-50 dark:bg-slate-900/50 border border-slate-100 dark:border-slate-800' : 'border border-slate-100 dark:border-slate-800' }} {{ !$lesson['joinable'] && $loop->last ? 'opacity-60' : '' }} flex flex-col gap-3">
                                <div class="flex items-center gap-3">
                                    <div class="size-10 rounded-lg {{ $lesson['color'] }} flex items-center justify-center font-bold text-sm">
                                        {{ $lesson['initials'] }}
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-bold text-slate-900 dark:text-white">{{ $lesson['name'] }}</p>
                                        <p class="text-[11px] text-slate-500 uppercase tracking-tighter">{{ $lesson['subject'] }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-xs font-bold {{ $lesson['joinable'] ? 'text-primary' : '' }}">{{ $lesson['day'] }}</p>
                                        <p class="text-[10px] text-slate-400">{{ $lesson['time'] }}</p>
                                    </div>
                                </div>
                                @if($lesson['joinable'])
                                <button class="w-full py-2.5 bg-primary text-white text-xs font-bold rounded-lg hover:bg-primary/90 shadow-lg shadow-primary/20 transition-all flex items-center justify-center gap-2">
                                    <span class="material-symbols-outlined text-sm">video_call</span>
                                    Join Lesson
                                </button>
                                @endif
                            </div>
                            @endforeach

                        </div>
                        <a href="{{ route('student.bookings.index') }}"
                            class="mt-6 w-full py-2 text-slate-500 text-sm font-semibold hover:text-primary hover:bg-slate-50 dark:hover:bg-slate-900 transition-colors rounded-lg border border-dashed border-slate-300 dark:border-slate-700 flex items-center justify-center">
                            Show Full Schedule
                        </a>
                    </section>

                    {{-- Upgrade Banner --}}
                    <section class="bg-primary rounded-2xl p-6 text-white relative overflow-hidden">
                        <div class="relative z-10">
                            <h4 class="text-lg font-bold mb-2">Unlock Premium</h4>
                            <p class="text-xs mb-4 opacity-90 leading-relaxed">
                                Get unlimited access to 1-on-1 sessions and certificates.
                            </p>
                            <button class="bg-white text-primary px-4 py-2 rounded-lg text-xs font-bold hover:bg-slate-50 transition-colors">
                                Upgrade Now
                            </button>
                        </div>
                        <div class="absolute -bottom-4 -right-4 size-24 bg-white/10 rounded-full blur-xl"></div>
                        <div class="absolute top-0 right-0 p-4 opacity-20">
                            <span class="material-symbols-outlined text-4xl">workspace_premium</span>
                        </div>
                    </section>

                </div>

            </div>
        </div>
    </main>
</div>

@endsection
