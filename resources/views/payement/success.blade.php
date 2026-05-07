@extends('layouts.app')
@section('title', 'Payment Successful')
@section('content')

<div class="min-h-screen bg-background-light dark:bg-background-dark flex items-center justify-center p-6">
    <div class="max-w-lg w-full text-center">

        {{-- Success Icon --}}
        <div class="size-28 rounded-full bg-emerald-50 dark:bg-emerald-900/20 flex items-center justify-center mx-auto mb-8 border-4 border-emerald-100 dark:border-emerald-900/40">
            <span class="material-symbols-outlined text-emerald-500" style="font-size:3.5rem">check_circle</span>
        </div>

        <h1 class="text-3xl font-black text-slate-900 dark:text-white mb-3">Payment Successful! 🎉</h1>
        <p class="text-slate-500 dark:text-slate-400 mb-8 leading-relaxed">
            Your session has been confirmed. Check your email for the meeting details.
        </p>

        @if($booking)
        <div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 p-6 mb-8 text-left">
            <h3 class="font-bold mb-4 text-center">Booking Details</h3>
            <div class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <span class="text-slate-500">Teacher</span>
                    <span class="font-semibold">{{ $booking->teacher->personne->name }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-slate-500">Date</span>
                    <span class="font-semibold">{{ \Carbon\Carbon::parse($booking->date)->format('D, M d Y') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-slate-500">Time</span>
                    <span class="font-semibold">{{ $booking->time }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-slate-500">Duration</span>
                    <span class="font-semibold">{{ $booking->duration }} min</span>
                </div>
                @if($booking->payment)
                <div class="flex justify-between pt-3 border-t border-slate-100 dark:border-slate-700 font-bold">
                    <span>Amount Paid</span>
                    <span class="text-emerald-600">${{ number_format($booking->payment->amount, 2) }}</span>
                </div>
                <div class="flex justify-between text-xs text-slate-400">
                    <span>Transaction ID</span>
                    <span>{{ $booking->payment->transaction_id }}</span>
                </div>
                @endif
            </div>
        </div>
        @endif

        <div class="flex flex-col gap-3">
            <a href="{{ route('student.bookings.index') }}"
                class="w-full py-3 bg-primary text-white font-bold rounded-xl hover:bg-primary/90 transition-colors">
                View My Bookings
            </a>
            <a href="{{ route('student.dashboard') }}"
                class="w-full py-3 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 font-bold rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                Go to Dashboard
            </a>
        </div>

    </div>
</div>

@endsection
