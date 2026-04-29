@extends('layouts.app')

@section('title', 'Course Detail')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.teacher-sidebar')

    <main class="flex-1 flex flex-col overflow-hidden">

        <header class="h-16 flex-shrink-0 flex items-center justify-between px-8 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
            <div class="flex items-center gap-3">
                <a href="{{ route('teacher.courses.index') }}" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors text-slate-500">
                    <span class="material-symbols-outlined">arrow_back</span>
                </a>
                <h2 class="text-lg font-bold">Course Detail</h2>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('teacher.courses.edit', 1) }}"
                    class="flex items-center gap-2 px-4 py-2 border border-slate-200 dark:border-slate-700 text-sm font-bold rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                    <span class="material-symbols-outlined text-base">edit</span>
                    Edit
                </a>
                <button class="flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-colors">
                    <span class="material-symbols-outlined text-base">video_call</span>
                    Start Session
                </button>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Left --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- Cover --}}
                    <div class="h-48 bg-gradient-to-br from-primary/30 to-indigo-400/30 rounded-2xl flex items-center justify-center relative">
                        <span class="material-symbols-outlined text-8xl text-primary/20">design_services</span>
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-emerald-500 text-white text-xs font-bold rounded-full">Published</span>
                        </div>
                        <div class="absolute bottom-4 left-4">
                            <span class="bg-white/90 px-3 py-1 rounded-full text-xs font-bold uppercase">Design</span>
                        </div>
                    </div>

                    {{-- Info --}}
                    <div>
                        <h1 class="text-2xl font-extrabold mb-2">{{$course->title}}</h1>
                        <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500">
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-base">group</span> 54 students</span>
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-base">menu_book</span> {{ $course->lessons_count ?? $course->lessons()->count() }} lessons</span>
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-base">schedule</span> 18h total</span>
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-base text-yellow-400">star</span> 4.9 rating</span>
                        </div>
                    </div>

                    {{-- Lessons --}}
                    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                        <div class="p-5 border-b border-slate-100 dark:border-slate-700 flex items-center justify-between">
                            <h3 class="font-bold">Lessons</h3>
                            <button class="text-sm font-bold text-primary flex items-center gap-1 hover:underline">
                                <span class="material-symbols-outlined text-base">add</span> Add Lesson
                            </button>
                        </div>
                        <div class="divide-y divide-slate-100 dark:divide-slate-700">

                            @foreach($lessons as $lesson)
                            <div class="flex items-center gap-4 px-5 py-3 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                                {{-- <span class="material-symbols-outlined text-slate-300 cursor-grab">drag_indicator</span> --}}
                                <div class="size-7 rounded-full {{ $lesson['published'] ? 'bg-emerald-100 text-emerald-600' : 'bg-slate-100 dark:bg-slate-700 text-slate-400' }} flex items-center justify-center text-xs font-bold">
                                    {{-- {{ $i + 1 }} --}}
                                </div>
                                <p class="flex-1 text-sm font-semibold">{{ $lesson['title'] }}</p>
                                <span class="text-xs text-slate-400">{{ $lesson['duration'] }}</span>
                                <button class="p-1 text-slate-400 hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-lg">edit</span>
                                </button>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                {{-- Right --}}
                <div class="space-y-6">

                    {{-- Stats --}}
                    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                        <h4 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-4">Course Stats</h4>
                        <div class="space-y-4">

                            {{-- @foreach($cstats as $stat)
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-500">{{ $stat['label'] }}</span>
                                <span class="text-sm font-bold">{{ $stat['value'] }}</span>
                            </div>
                            @endforeach --}}
                        </div>
                    </div>

                    {{-- Danger Zone --}}
                    <div class="bg-white dark:bg-slate-800 rounded-xl border border-rose-100 dark:border-rose-900/30 p-6">
                        <h4 class="text-sm font-bold uppercase tracking-wider text-rose-500 mb-4">Danger Zone</h4>
                        <p class="text-xs text-slate-500 mb-4">Unpublishing will hide this course from students. Deleting is permanent.</p>
                        <div class="space-y-2">
                            <button class="w-full py-2 text-sm font-bold text-amber-600 bg-amber-50 dark:bg-amber-900/20 rounded-lg hover:bg-amber-100 transition-colors">
                                Unpublish Course
                            </button>
                            <button class="w-full py-2 text-sm font-bold text-rose-600 bg-rose-50 dark:bg-rose-900/20 rounded-lg hover:bg-rose-100 transition-colors">
                                Delete Course
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>

@endsection
