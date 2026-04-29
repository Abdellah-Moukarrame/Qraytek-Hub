@extends('layouts.app')

@section('title', 'Find Tutors')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.student-sidebar')

    <main class="flex-1 flex flex-col overflow-hidden">

        <header class="h-16 flex-shrink-0 flex items-center justify-between px-8 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
            <div class="flex items-center gap-4 flex-1">
                <h2 class="text-lg font-bold">Find Tutors</h2>
                <div class="max-w-md w-full ml-4 relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">search</span>
                    <input type="text" placeholder="Search by name or subject..." class="w-full bg-slate-100 dark:bg-slate-800 border-none rounded-lg py-2 pl-10 pr-4 text-sm focus:ring-2 focus:ring-primary/50" />
                </div>
            </div>
            <select class="bg-slate-100 dark:bg-slate-800 border-none rounded-lg py-2 px-4 text-sm focus:ring-2 focus:ring-primary/50">
                <option>All Subjects</option>
                <option>Design</option>
                <option>Development</option>
                <option>Languages</option>
                <option>Sciences</option>
            </select>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">



                @foreach($teachers as $teacher)
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6 hover:shadow-lg hover:border-primary/30 transition-all group">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="size-14 rounded-full flex items-center justify-center font-bold text-lg">
                            {{ substr($teacher->personne->name, 0, 2) }}
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <h4 class="font-bold">{{ $teacher->personne->name }}</h4>
                                <span class="text-xs font-bold bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 px-2 py-0.5 rounded-full">{{ $teacher['tag'] }}</span>
                            </div>
                            <p class="text-sm text-slate-500">{{ $teacher->subject }}</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-xs text-slate-500 mb-4">
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">work_history</span> {{ $teacher->experiencej }}</span>
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">group</span> {{ $teacher['students'] }} students</span>
                        <span class="font-bold text-primary text-sm">{{ $teacher->hourly_rate }}$/h</span>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('student.teachers.show', $teacher->id) }}"
                            class="flex-1 py-2 text-center text-sm font-bold border border-slate-200 dark:border-slate-600 rounded-lg hover:border-primary hover:text-primary transition-colors">
                            View Profile
                        </a>
                        <a href="{{ route('student.bookings.create') }}"
                            class="flex-1 py-2 text-center text-sm font-bold bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                            Book Now
                        </a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </main>
</div>

@endsection
