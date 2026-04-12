@extends('layouts.app')

@section('title', 'My Courses')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.teacher-sidebar')

    <main class="flex-1 flex flex-col overflow-hidden">

        <header class="h-16 flex-shrink-0 flex items-center justify-between px-8 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
            <h2 class="text-lg font-bold">My Courses</h2>
            <a href="{{ route('teacher.courses.create') }}"
                class="flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-colors">
                <span class="material-symbols-outlined text-lg">add_circle</span>
                Create Course
            </a>
        </header>

        <div class="flex-1 overflow-y-auto p-8 space-y-6">

            {{-- Stats --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                $stats = [
                    ['label' => 'Total Courses', 'value' => '6', 'icon' => 'menu_book', 'color' => 'bg-primary/10 text-primary'],
                    ['label' => 'Published', 'value' => '4', 'icon' => 'public', 'color' => 'bg-emerald-50 text-emerald-600'],
                    ['label' => 'Drafts', 'value' => '2', 'icon' => 'draft', 'color' => 'bg-amber-50 text-amber-600'],
                ];
                @endphp
                @foreach($stats as $stat)
                <div class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                    <div class="p-3 {{ $stat['color'] }} rounded-xl">
                        <span class="material-symbols-outlined">{{ $stat['icon'] }}</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">{{ $stat['label'] }}</p>
                        <h3 class="text-2xl font-bold">{{ $stat['value'] }}</h3>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Courses Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @php
                $courses = [
                    ['title' => 'Advanced UI Systems', 'students' => 54, 'lessons' => 24, 'status' => 'published', 'color' => 'from-primary/30 to-indigo-400/30', 'icon' => 'design_services', 'tag' => 'Design', 'rating' => 4.9],
                    ['title' => 'React Advanced Hooks', 'students' => 38, 'lessons' => 18, 'status' => 'published', 'color' => 'from-emerald-300/30 to-teal-400/30', 'icon' => 'code', 'tag' => 'Development', 'rating' => 4.8],
                    ['title' => 'Figma Mastery', 'students' => 50, 'lessons' => 15, 'status' => 'published', 'color' => 'from-purple-300/30 to-pink-300/30', 'icon' => 'draw', 'tag' => 'Design', 'rating' => 4.7],
                    ['title' => 'Design Thinking Workshop', 'students' => 0, 'lessons' => 10, 'status' => 'draft', 'color' => 'from-amber-300/30 to-orange-300/30', 'icon' => 'lightbulb', 'tag' => 'Design', 'rating' => null],
                    ['title' => 'CSS Architecture', 'students' => 0, 'lessons' => 8, 'status' => 'draft', 'color' => 'from-rose-300/30 to-red-300/30', 'icon' => 'css', 'tag' => 'Development', 'rating' => null],
                    ['title' => 'UI Animation Basics', 'students' => 30, 'lessons' => 12, 'status' => 'published', 'color' => 'from-cyan-300/30 to-blue-300/30', 'icon' => 'animation', 'tag' => 'Design', 'rating' => 4.6],
                ];
                @endphp
                @foreach($courses as $course)
                <div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 hover:shadow-lg transition-shadow group">
                    <div class="h-32 bg-gradient-to-br {{ $course['color'] }} relative flex items-center justify-center">
                        <span class="material-symbols-outlined text-5xl text-slate-400/50">{{ $course['icon'] }}</span>
                        <div class="absolute top-3 right-3">
                            @if($course['status'] === 'published')
                                <span class="px-2 py-1 bg-emerald-500 text-white text-[10px] font-bold rounded-full">Published</span>
                            @else
                                <span class="px-2 py-1 bg-slate-500 text-white text-[10px] font-bold rounded-full">Draft</span>
                            @endif
                        </div>
                        <div class="absolute bottom-3 left-3 bg-white/90 dark:bg-slate-900/90 px-2 py-1 rounded text-[10px] font-bold uppercase">
                            {{ $course['tag'] }}
                        </div>
                    </div>
                    <div class="p-5">
                        <h4 class="font-bold mb-1">{{ $course['title'] }}</h4>
                        <div class="flex items-center gap-3 text-xs text-slate-500 mb-4">
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">group</span> {{ $course['students'] }} students</span>
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">menu_book</span> {{ $course['lessons'] }} lessons</span>
                            @if($course['rating'])
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm text-yellow-400">star</span> {{ $course['rating'] }}</span>
                            @endif
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('teacher.courses.show', 1) }}"
                                class="flex-1 py-2 text-center text-xs font-bold border border-slate-200 dark:border-slate-600 rounded-lg hover:border-primary hover:text-primary transition-colors">
                                View
                            </a>
                            <a href="{{ route('teacher.courses.edit', 1) }}"
                                class="flex-1 py-2 text-center text-xs font-bold bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </main>
</div>

@endsection
