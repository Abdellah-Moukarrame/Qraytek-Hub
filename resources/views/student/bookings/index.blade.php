@extends('layouts.app')

@section('title', 'My Bookings')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.student-sidebar')

    <main class="flex-1 flex flex-col overflow-hidden">

        {{-- Header --}}
        <header class="h-16 flex-shrink-0 flex items-center justify-between px-8 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
            <h2 class="text-lg font-bold">My Bookings</h2>
            <a href="{{ route('student.bookings.create') }}"
                class="flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-colors">
                <span class="material-symbols-outlined text-lg">add_circle</span>
                New Booking
            </a>
        </header>

        <div class="flex-1 overflow-y-auto p-8 space-y-6">

            {{-- Upcoming Bookings --}}
            <div>
                <h3 class="text-lg font-bold mb-4">Upcoming Sessions</h3>
                <div class="space-y-4">

                    @php
                    $upcoming = [
                        ['initials' => 'SM', 'color' => 'bg-primary/20 text-primary', 'name' => 'Sarah Miller', 'subject' => 'Advanced UI Systems', 'date' => 'Today', 'time' => '14:00 PM', 'price' => '$45.00', 'joinable' => true],
                        ['initials' => 'DC', 'color' => 'bg-emerald-100 text-emerald-600', 'name' => 'David Chen', 'subject' => 'React Advanced Hooks', 'date' => 'Tomorrow', 'time' => '10:30 AM', 'price' => '$50.00', 'joinable' => false],
                        ['initials' => 'ER', 'color' => 'bg-amber-100 text-amber-600', 'name' => 'Elena Rodriguez', 'subject' => 'Spanish Advanced', 'date' => 'Oct 24, 2024', 'time' => '09:00 AM', 'price' => '$35.00', 'joinable' => false],
                    ];
                    @endphp

                    @foreach($upcoming as $booking)
                    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-5 flex items-center gap-5">
                        <div class="size-12 rounded-full {{ $booking['color'] }} flex items-center justify-center font-bold">
                            {{ $booking['initials'] }}
                        </div>
                        <div class="flex-1">
                            <p class="font-bold text-slate-900 dark:text-white">{{ $booking['name'] }}</p>
                            <p class="text-sm text-slate-500">{{ $booking['subject'] }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-sm font-bold {{ $booking['joinable'] ? 'text-primary' : 'text-slate-700 dark:text-slate-300' }}">{{ $booking['date'] }}</p>
                            <p class="text-xs text-slate-400">{{ $booking['time'] }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-bold">{{ $booking['price'] }}</p>
                            <span class="text-xs text-emerald-600 bg-emerald-50 dark:bg-emerald-900/20 px-2 py-0.5 rounded-full font-bold">Paid</span>
                        </div>
                        <div class="flex items-center gap-2">
                            @if($booking['joinable'])
                            <button class="flex items-center gap-1.5 px-4 py-2 bg-primary text-white text-sm font-bold rounded-lg hover:bg-primary/90 transition-colors">
                                <span class="material-symbols-outlined text-base">video_call</span>
                                Join
                            </button>
                            @else
                            <a href="{{ route('student.bookings.show', 1) }}"
                                class="px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300 text-sm font-bold rounded-lg hover:bg-slate-200 transition-colors">
                                Details
                            </a>
                            @endif
                            <button class="p-2 text-slate-400 hover:text-rose-500 hover:bg-rose-50 rounded-lg transition-colors">
                                <span class="material-symbols-outlined text-lg">cancel</span>
                            </button>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            {{-- Past Bookings --}}
            <div>
                <h3 class="text-lg font-bold mb-4">Past Sessions</h3>
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-slate-50 dark:bg-slate-800/50">
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Instructor</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Subject</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Amount</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                            @php
                            $past = [
                                ['initials' => 'SM', 'color' => 'bg-primary/20 text-primary', 'name' => 'Sarah Miller', 'subject' => 'Advanced UI Systems', 'date' => 'Oct 10, 2024', 'amount' => '$45.00', 'status' => 'completed'],
                                ['initials' => 'MR', 'color' => 'bg-indigo-100 text-indigo-600', 'name' => 'Marco Rossi', 'subject' => 'Italian Literature', 'date' => 'Oct 5, 2024', 'amount' => '$35.00', 'status' => 'completed'],
                                ['initials' => 'DC', 'color' => 'bg-emerald-100 text-emerald-600', 'name' => 'David Chen', 'subject' => 'React Hooks', 'date' => 'Sep 28, 2024', 'amount' => '$50.00', 'status' => 'cancelled'],
                            ];
                            @endphp
                            @foreach($past as $booking)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="size-8 rounded-full {{ $booking['color'] }} flex items-center justify-center font-bold text-xs">
                                            {{ $booking['initials'] }}
                                        </div>
                                        <span class="text-sm font-semibold">{{ $booking['name'] }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">{{ $booking['subject'] }}</td>
                                <td class="px-6 py-4 text-sm text-slate-500">{{ $booking['date'] }}</td>
                                <td class="px-6 py-4 text-sm font-bold">{{ $booking['amount'] }}</td>
                                <td class="px-6 py-4">
                                    @if($booking['status'] === 'completed')
                                        <span class="px-2.5 py-1 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 text-xs font-bold rounded-full">Completed</span>
                                    @else
                                        <span class="px-2.5 py-1 bg-rose-50 dark:bg-rose-900/20 text-rose-600 text-xs font-bold rounded-full">Cancelled</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('student.bookings.show', 1) }}" class="text-xs font-bold text-primary hover:underline">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
</div>

@endsection
