@extends('layouts.app')

@section('title', 'My Courses')

@section('content')

    <div
        class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

        @include('layouts.sidebars.teacher-sidebar')

        <main class="flex-1 flex flex-col overflow-hidden">

            <header
                class="h-16 flex-shrink-0 flex items-center justify-between px-8 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
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
                            [
                                'label' => 'Total Courses',
                                'value' => '6',
                                'icon' => 'menu_book',
                                'color' => 'bg-primary/10 text-primary',
                            ],
                            [
                                'label' => 'Published',
                                'value' => '4',
                                'icon' => 'public',
                                'color' => 'bg-emerald-50 text-emerald-600',
                            ],
                            [
                                'label' => 'Drafts',
                                'value' => '2',
                                'icon' => 'draft',
                                'color' => 'bg-amber-50 text-amber-600',
                            ],
                        ];
                    @endphp
                    @foreach ($stats as $stat)
                        <div
                            class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
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

                    @forelse($courses as $course)
                        <div
                            class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 hover:shadow-lg transition-shadow group">

                            {{-- Cover Image --}}
                            <div class="h-32 relative overflow-hidden">
                                @if ($course->image_path)
                                    <img src="{{ asset('storage/' . $course->image_path) }}" alt="{{ $course->title }}"
                                        class="w-full h-full object-cover" />
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-primary/20 to-indigo-400/20 flex items-center justify-center">
                                        <span class="material-symbols-outlined text-5xl text-slate-400/50">menu_book</span>
                                    </div>
                                @endif

                                {{-- Category badge --}}
                                <div
                                    class="absolute bottom-3 left-3 bg-white/90 dark:bg-slate-900/90 px-2 py-1 rounded text-[10px] font-bold uppercase">
                                    {{ $course->category ?? 'General' }}
                                </div>

                                {{-- Level badge --}}
                                <div class="absolute top-3 right-3">
                                    @php
                                        $levelColors = [
                                            'beginner' => 'bg-emerald-500',
                                            'intermediate' => 'bg-amber-500',
                                            'advanced' => 'bg-rose-500',
                                        ];
                                    @endphp
                                    <span
                                        class="px-2 py-1 {{ $levelColors[$course->level] ?? 'bg-slate-500' }} text-white text-[10px] font-bold rounded-full capitalize">
                                        {{ $course->level }}
                                    </span>
                                </div>
                            </div>

                            {{-- Course Info --}}
                            <div class="p-5">
                                <h4 class="font-bold mb-1 truncate">{{ $course->title }}</h4>
                                <p class="text-xs text-slate-500 mb-3 line-clamp-2">
                                    {{ $course->description ?? 'No description provided.' }}</p>

                                <div class="flex items-center gap-3 text-xs text-slate-500 mb-4">
                                    {{-- Students count --}}
                                    <span class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-sm">group</span>
                                        students
                                    </span>

                                    {{-- Lessons count --}}
                                    <span class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-sm">menu_book</span>
                                        {{ $course->lessons_count ?? $course->lessons()->count() }} lessons
                                    </span>
                                </div>

                                {{-- Actions --}}
                                <div class="flex gap-2">
                                    <a href="{{ route('teacher.courses.show', $course->id) }}"
                                        class="flex-1 py-2 text-center text-xs font-bold border border-slate-200 dark:border-slate-600 rounded-lg hover:border-primary hover:text-primary transition-colors">
                                        View
                                    </a>
                                    <a href="{{ route('teacher.courses.edit', $course->id) }}"
                                        class="flex-1 py-2 text-center text-xs font-bold bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                                        Edit
                                    </a>
                                    {{-- Delete --}}
                                    <form method="POST" action="{{ route('teacher.courses.destroy', $course->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="py-2 px-3 text-xs font-bold text-rose-500 border border-rose-200 dark:border-rose-800 rounded-lg hover:bg-rose-50 dark:hover:bg-rose-900/20 transition-colors">
                                            <span class="material-symbols-outlined text-sm">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    @empty
                        {{-- Empty state --}}
                        <div class="col-span-3 text-center py-16">
                            <span class="material-symbols-outlined text-6xl text-slate-300 block mb-4">menu_book</span>
                            <h3 class="text-lg font-bold text-slate-500 mb-2">No courses yet</h3>
                            <p class="text-sm text-slate-400 mb-6">Start by creating your first course.</p>
                            <a href="{{ route('teacher.courses.create') }}"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-white font-bold rounded-xl hover:bg-primary/90 transition-colors">
                                <span class="material-symbols-outlined">add_circle</span>
                                Create First Course
                            </a>
                        </div>
                    @endforelse

                </div>

                {{-- Pagination --}}
                {{-- @if ($courses->hasPages())
                    <div class="mt-6">
                        {{ $courses->links() }}
                    </div>
                @endif --}}

            </div>
        </main>
    </div>

@endsection
