@extends('layouts.app')

@section('title', 'Teacher Profile')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.student-sidebar')

    <main class="flex-1 flex flex-col overflow-hidden">

        <header class="h-16 flex-shrink-0 flex items-center justify-between px-8 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
            <div class="flex items-center gap-3">
                <a href="{{ route('student.teachers.index') }}" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors text-slate-500">
                    <span class="material-symbols-outlined">arrow_back</span>
                </a>
                <h2 class="text-lg font-bold">Teacher Profile</h2>
            </div>
            <a href="{{ route('student.bookings.create') }}"
                class="flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-colors">
                <span class="material-symbols-outlined text-lg">calendar_month</span>
                Book a Session
            </a>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Left: Profile --}}
                <div class="space-y-6">
                    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6 flex flex-col items-center text-center">
                        <div class="size-24 rounded-full bg-primary/20 flex items-center justify-center text-primary font-black text-3xl mb-4">{{ substr($teacher->personne->name, 0, 2) }}</div>
                        <h3 class="text-xl font-bold">{{$teacher->personne->name}}</h3>
                        <p class="text-sm text-slate-500 mt-1">{{$teacher->subject}}</p>
                        <div class="w-full mt-6 pt-6 border-t border-slate-100 dark:border-slate-700 grid grid-cols-3 gap-4 text-center">
                            <div>
                                <p class="text-lg font-bold">142</p>
                                <p class="text-xs text-slate-500">Students</p>
                            </div>
                            <div>
                                <p class="text-lg font-bold">{{$teacher->courses->count()}}</p>
                                <p class="text-xs text-slate-500">Courses</p>
                            </div>
                            <div>
                                <p class="text-lg font-bold">{{$teacher->experience}}</p>
                                <p class="text-xs text-slate-500">Experience</p>
                            </div>
                        </div>
                    </div>

                    {{-- Rate & Availability --}}
                    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                        <h4 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-4">Rate & Availability</h4>
                        <p class="text-3xl font-black text-primary mb-1">${{$teacher->hourly_rate}}<span class="text-base font-medium text-slate-400">/hr</span></p>
                        <p class="text-xs text-slate-500 mb-4">Per session (1 hour)</p>
                        <div class="space-y-2">
                            @foreach(['Mon — 14:00 to 18:00', 'Wed — 10:00 to 16:00', 'Fri — 09:00 to 13:00'] as $slot)
                            <div class="flex items-center gap-2 text-sm">
                                <span class="size-2 rounded-full bg-emerald-500 inline-block"></span>
                                <span class="text-slate-600 dark:text-slate-400">{{ $slot }}</span>
                            </div>
                            @endforeach
                        </div>
                        <a href="{{ route('student.bookings.create') }}"
                            class="mt-4 block w-full py-2.5 bg-primary text-white text-sm font-bold rounded-lg hover:bg-primary/90 transition-colors text-center">
                            Book a Session
                        </a>
                    </div>
                </div>

                {{-- Right: Details --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- About --}}
                    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                        <h4 class="font-bold mb-3">About</h4>
                        @if (!$teacher->bio)
                           <h5 class="font-bold mb-3">This Teacher Has No Bio</h5>
                        @endif
                        <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                            {{$teacher->bio}}
                        </p>
                    </div>

                    {{-- Courses --}}
                    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                        <h4 class="font-bold mb-4">Courses by {{$teacher->personne->name}}</h4>
                        <div class="space-y-3">

                            @foreach($teacher->courses as $course)
                            <div class="flex items-center justify-between p-3 bg-slate-50 dark:bg-slate-700/50 rounded-lg">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-primary">menu_book</span>
                                    <div>
                                        <p class="text-sm font-semibold">{{ $course['title'] }}</p>
                                        <p class="text-xs text-slate-500">{{ $course->lessons->count() }} lessons · {{ $course['students'] }} students</p>
                                    </div>
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
