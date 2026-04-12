@extends('layouts.app')

@section('title', 'Create Course')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.teacher-sidebar')

    <main class="flex-1 flex flex-col overflow-hidden">

        <header class="h-16 flex-shrink-0 flex items-center gap-3 px-8 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
            <a href="{{ route('teacher.courses.index') }}" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors text-slate-500">
                <span class="material-symbols-outlined">arrow_back</span>
            </a>
            <h2 class="text-lg font-bold">Create New Course</h2>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            <div class="max-w-3xl mx-auto space-y-6">

                {{-- Basic Info --}}
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                    <h3 class="font-bold mb-4">Course Information</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Course Title</label>
                            <input type="text" placeholder="e.g. Advanced UI Systems" class="w-full bg-slate-100 dark:bg-slate-700 border-none rounded-lg py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary/50" />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Description</label>
                            <textarea rows="4" placeholder="Describe what students will learn in this course..." class="w-full bg-slate-100 dark:bg-slate-700 border-none rounded-lg py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary/50 resize-none"></textarea>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Category</label>
                                <select class="w-full bg-slate-100 dark:bg-slate-700 border-none rounded-lg py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary/50">
                                    <option>Select a category</option>
                                    <option>Design</option>
                                    <option>Development</option>
                                    <option>Languages</option>
                                    <option>Sciences</option>
                                    <option>Mathematics</option>
                                    <option>Business</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Level</label>
                                <select class="w-full bg-slate-100 dark:bg-slate-700 border-none rounded-lg py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary/50">
                                    <option>Beginner</option>
                                    <option>Intermediate</option>
                                    <option>Advanced</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Lessons --}}
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold">Course Lessons</h3>
                        <button class="flex items-center gap-1 text-sm font-bold text-primary hover:underline">
                            <span class="material-symbols-outlined text-base">add</span>
                            Add Lesson
                        </button>
                    </div>
                    <div class="space-y-3">
                        @foreach(['Introduction & Overview', 'Core Concepts', 'Hands-on Practice'] as $i => $lesson)
                        <div class="flex items-center gap-3 p-3 bg-slate-50 dark:bg-slate-700/50 rounded-lg">
                            <span class="material-symbols-outlined text-slate-400 cursor-grab">drag_indicator</span>
                            <div class="size-7 rounded-full bg-primary/20 text-primary flex items-center justify-center text-xs font-bold">{{ $i + 1 }}</div>
                            <input type="text" value="{{ $lesson }}" class="flex-1 bg-transparent border-none text-sm focus:ring-0 focus:outline-none font-medium" />
                            <button class="text-slate-400 hover:text-rose-500 transition-colors">
                                <span class="material-symbols-outlined text-lg">delete</span>
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Upload Resources --}}
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                    <h3 class="font-bold mb-4">Course Resources</h3>
                    <div class="border-2 border-dashed border-slate-200 dark:border-slate-600 rounded-xl p-8 text-center hover:border-primary transition-colors cursor-pointer">
                        <span class="material-symbols-outlined text-4xl text-slate-300 mb-2">upload_file</span>
                        <p class="text-sm font-semibold text-slate-600 dark:text-slate-400">Drag & drop files here</p>
                        <p class="text-xs text-slate-400 mt-1">Support for PDF, MP4, ZIP — max 500MB</p>
                        <button class="mt-4 px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300 text-sm font-bold rounded-lg hover:bg-slate-200 transition-colors">
                            Browse Files
                        </button>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex gap-4">
                    <button class="flex-1 py-3 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300 font-bold rounded-lg hover:bg-slate-200 transition-colors">
                        Save as Draft
                    </button>
                    <button class="flex-1 py-3 bg-primary text-white font-bold rounded-lg hover:bg-primary/90 transition-colors flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined">public</span>
                        Publish Course
                    </button>
                </div>

            </div>
        </div>
    </main>
</div>

@endsection
