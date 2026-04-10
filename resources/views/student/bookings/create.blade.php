@extends('layouts.app')

@section('title', 'Book a Session')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.student-sidebar')

    <main class="flex-1 flex flex-col overflow-hidden">

        {{-- Header --}}
        <header class="h-16 flex-shrink-0 flex items-center gap-3 px-8 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
            <a href="{{ route('student.bookings.index') }}" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors text-slate-500">
                <span class="material-symbols-outlined">arrow_back</span>
            </a>
            <h2 class="text-lg font-bold">Book a Session</h2>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            <div class="max-w-3xl mx-auto space-y-6">

                {{-- Step 1: Choose Teacher --}}
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                    <h3 class="font-bold mb-1">Step 1 — Choose a Teacher</h3>
                    <p class="text-sm text-slate-500 mb-4">Select the teacher you want to book a session with.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @php
                        $teachers = [
                            ['initials' => 'SM', 'color' => 'bg-primary/20 text-primary', 'name' => 'Sarah Miller', 'subject' => 'UI Design', 'rate' => '$45/hr'],
                            ['initials' => 'DC', 'color' => 'bg-emerald-100 text-emerald-600', 'name' => 'David Chen', 'subject' => 'React Development', 'rate' => '$50/hr'],
                            ['initials' => 'MR', 'color' => 'bg-indigo-100 text-indigo-600', 'name' => 'Marco Rossi', 'subject' => 'Italian Literature', 'rate' => '$35/hr'],
                            ['initials' => 'ER', 'color' => 'bg-amber-100 text-amber-600', 'name' => 'Elena Rodriguez', 'subject' => 'Spanish', 'rate' => '$30/hr'],
                        ];
                        @endphp
                        @foreach($teachers as $teacher)
                        <div class="flex items-center gap-3 p-3 border-2 border-slate-100 dark:border-slate-700 rounded-xl hover:border-primary cursor-pointer transition-colors">
                            <div class="size-10 rounded-full {{ $teacher['color'] }} flex items-center justify-center font-bold text-sm">
                                {{ $teacher['initials'] }}
                            </div>
                            <div class="flex-1">
                                <p class="font-bold text-sm">{{ $teacher['name'] }}</p>
                                <p class="text-xs text-slate-500">{{ $teacher['subject'] }}</p>
                            </div>
                            <span class="text-xs font-bold text-primary">{{ $teacher['rate'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Step 2: Choose Date & Time --}}
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                    <h3 class="font-bold mb-1">Step 2 — Choose Date & Time</h3>
                    <p class="text-sm text-slate-500 mb-4">Pick an available slot from the teacher's calendar.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Date</label>
                            <input type="date" class="w-full bg-slate-100 dark:bg-slate-700 border-none rounded-lg py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary/50" />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Available Slots</label>
                            <div class="grid grid-cols-3 gap-2">
                                @foreach(['09:00', '10:00', '11:00', '14:00', '15:00', '16:00'] as $slot)
                                <button class="py-2 text-xs font-bold rounded-lg border border-slate-200 dark:border-slate-600 hover:border-primary hover:text-primary hover:bg-primary/5 transition-colors">
                                    {{ $slot }}
                                </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Step 3: Session Details --}}
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                    <h3 class="font-bold mb-1">Step 3 — Session Details</h3>
                    <p class="text-sm text-slate-500 mb-4">Provide more context to help the teacher prepare.</p>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Subject / Topic</label>
                            <input type="text" placeholder="e.g. Help with Component Architecture" class="w-full bg-slate-100 dark:bg-slate-700 border-none rounded-lg py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary/50" />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Notes (optional)</label>
                            <textarea rows="3" placeholder="Any specific questions or areas you'd like to focus on..." class="w-full bg-slate-100 dark:bg-slate-700 border-none rounded-lg py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary/50 resize-none"></textarea>
                        </div>
                    </div>
                </div>

                {{-- Summary & Payment --}}
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                    <h3 class="font-bold mb-4">Summary</h3>
                    <div class="space-y-3 text-sm mb-6">
                        <div class="flex justify-between">
                            <span class="text-slate-500">Teacher</span>
                            <span class="font-semibold">Sarah Miller</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Date & Time</span>
                            <span class="font-semibold">—</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Duration</span>
                            <span class="font-semibold">1 hour</span>
                        </div>
                        <div class="pt-3 border-t border-slate-100 dark:border-slate-700 flex justify-between font-bold text-base">
                            <span>Total</span>
                            <span class="text-primary">$45.00</span>
                        </div>
                    </div>
                    <a href="{{ route('payment.checkout') }}"
                        class="block w-full py-3 bg-primary text-white text-sm font-bold rounded-lg hover:bg-primary/90 transition-colors text-center flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-base">payments</span>
                        Proceed to Payment
                    </a>
                </div>

            </div>
        </div>
    </main>
</div>

@endsection
