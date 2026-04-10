@extends('layouts.app')

@section('title', 'Booking Detail')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.student-sidebar')

    <main class="flex-1 flex flex-col overflow-hidden">

        <header class="h-16 flex-shrink-0 flex items-center gap-3 px-8 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
            <a href="{{ route('student.bookings.index') }}" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors text-slate-500">
                <span class="material-symbols-outlined">arrow_back</span>
            </a>
            <h2 class="text-lg font-bold">Booking Detail</h2>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            <div class="max-w-2xl mx-auto space-y-6">

                {{-- Status Banner --}}
                <div class="bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 rounded-xl p-4 flex items-center gap-3">
                    <span class="material-symbols-outlined text-emerald-500">check_circle</span>
                    <div>
                        <p class="font-bold text-emerald-700 dark:text-emerald-400">Session Confirmed</p>
                        <p class="text-xs text-emerald-600 dark:text-emerald-500">Your booking has been confirmed and payment received.</p>
                    </div>
                </div>

                {{-- Booking Info --}}
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                    <h3 class="font-bold mb-4">Session Details</h3>
                    <div class="flex items-center gap-4 p-4 bg-slate-50 dark:bg-slate-700/50 rounded-xl mb-4">
                        <div class="size-14 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-lg">SM</div>
                        <div>
                            <p class="font-bold text-lg">Sarah Miller</p>
                            <p class="text-sm text-slate-500">Advanced UI Systems</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div class="space-y-1">
                            <p class="text-slate-500">Date</p>
                            <p class="font-semibold">October 15, 2024</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-slate-500">Time</p>
                            <p class="font-semibold">14:00 PM — 15:00 PM</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-slate-500">Duration</p>
                            <p class="font-semibold">1 Hour</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-slate-500">Amount Paid</p>
                            <p class="font-semibold text-primary">$45.00</p>
                        </div>
                        <div class="col-span-2 space-y-1">
                            <p class="text-slate-500">Topic</p>
                            <p class="font-semibold">Help with Component Architecture</p>
                        </div>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex gap-4">
                    <button class="flex-1 py-3 bg-primary text-white font-bold rounded-lg hover:bg-primary/90 transition-colors flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined">video_call</span>
                        Join Session
                    </button>
                    <button class="flex-1 py-3 bg-rose-50 dark:bg-rose-900/20 text-rose-600 font-bold rounded-lg hover:bg-rose-100 transition-colors">
                        Cancel Booking
                    </button>
                </div>

            </div>
        </div>
    </main>
</div>

@endsection
