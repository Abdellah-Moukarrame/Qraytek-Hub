@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<div class="min-h-screen bg-background-light dark:bg-background-dark flex items-start justify-center p-8">
    <div class="w-full max-w-4xl">

        {{-- Header --}}
        <div class="flex items-center gap-3 mb-8">
            <a href="{{ route('student.bookings.index') }}"
                class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors text-slate-500">
                <span class="material-symbols-outlined">arrow_back</span>
            </a>
            <div>
                <h1 class="text-2xl font-black text-slate-900 dark:text-white">Complete Your Booking</h1>
                <p class="text-sm text-slate-500">Review your session and choose a payment method</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">

            {{-- Left: Payment Form --}}
            <div class="lg:col-span-3 space-y-6">

                <form method="POST" action="{{ route('payment.process') }}" id="payment-form">
                    @csrf
                    <input type="hidden" name="booking_id" value="{{ $booking->id }}">

                    {{-- Payment Method Selection --}}
                    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                        <h3 class="font-bold mb-4">Payment Method</h3>
                        <div class="grid grid-cols-3 gap-3 mb-6">

                            {{-- Card --}}
                            <label class="cursor-pointer">
                                <input type="radio" name="payment_method" value="card" class="hidden peer" checked />
                                <div class="peer-checked:border-primary peer-checked:bg-primary/5 border-2 border-slate-200 dark:border-slate-700 rounded-xl p-3 text-center transition-all">
                                    <span class="material-symbols-outlined text-2xl text-slate-400 peer-checked:text-primary block mb-1">credit_card</span>
                                    <p class="text-xs font-bold text-slate-600 dark:text-slate-300">Card</p>
                                </div>
                            </label>

                            {{-- Mobile Money --}}
                            <label class="cursor-pointer">
                                <input type="radio" name="payment_method" value="mobile_money" class="hidden peer" />
                                <div class="peer-checked:border-primary peer-checked:bg-primary/5 border-2 border-slate-200 dark:border-slate-700 rounded-xl p-3 text-center transition-all">
                                    <span class="material-symbols-outlined text-2xl text-slate-400 block mb-1">phone_android</span>
                                    <p class="text-xs font-bold text-slate-600 dark:text-slate-300">Mobile</p>
                                </div>
                            </label>

                            {{-- Wallet --}}
                            <label class="cursor-pointer">
                                <input type="radio" name="payment_method" value="wallet" class="hidden peer" />
                                <div class="peer-checked:border-primary peer-checked:bg-primary/5 border-2 border-slate-200 dark:border-slate-700 rounded-xl p-3 text-center transition-all">
                                    <span class="material-symbols-outlined text-2xl text-slate-400 block mb-1">account_balance_wallet</span>
                                    <p class="text-xs font-bold text-slate-600 dark:text-slate-300">Wallet</p>
                                </div>
                            </label>

                        </div>

                        {{-- Card Fields --}}
                        <div id="card-fields" class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Card Number</label>
                                <input type="text" name="card_number" placeholder="1234 5678 9012 3456" maxlength="19"
                                    oninput="formatCard(this)"
                                    class="w-full bg-slate-100 dark:bg-slate-700 border-2 border-transparent rounded-lg py-2.5 px-4 text-sm focus:outline-none focus:border-primary transition-all" />
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Cardholder Name</label>
                                <input type="text" name="card_name" placeholder="John Doe"
                                    class="w-full bg-slate-100 dark:bg-slate-700 border-2 border-transparent rounded-lg py-2.5 px-4 text-sm focus:outline-none focus:border-primary transition-all" />
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Expiry Date</label>
                                    <input type="text" name="card_expiry" placeholder="MM/YY" maxlength="5"
                                        oninput="formatExpiry(this)"
                                        class="w-full bg-slate-100 dark:bg-slate-700 border-2 border-transparent rounded-lg py-2.5 px-4 text-sm focus:outline-none focus:border-primary transition-all" />
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">CVV</label>
                                    <input type="text" name="card_cvv" placeholder="123" maxlength="3"
                                        class="w-full bg-slate-100 dark:bg-slate-700 border-2 border-transparent rounded-lg py-2.5 px-4 text-sm focus:outline-none focus:border-primary transition-all" />
                                </div>
                            </div>
                        </div>

                        {{-- Mobile Money Fields --}}
                        <div id="mobile-fields" class="hidden space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Phone Number</label>
                                <input type="tel" name="phone_number" placeholder="+212 6XX XXX XXX"
                                    class="w-full bg-slate-100 dark:bg-slate-700 border-2 border-transparent rounded-lg py-2.5 px-4 text-sm focus:outline-none focus:border-primary transition-all" />
                            </div>
                            <div class="bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 rounded-lg p-3 flex items-start gap-2">
                                <span class="material-symbols-outlined text-amber-500 text-base flex-shrink-0">info</span>
                                <p class="text-xs text-amber-700 dark:text-amber-400">You will receive a confirmation code on your phone to complete the payment.</p>
                            </div>
                        </div>

                        {{-- Wallet Fields --}}
                        <div id="wallet-fields" class="hidden space-y-4">
                            <div class="bg-primary/5 border border-primary/20 rounded-lg p-4 text-center">
                                <span class="material-symbols-outlined text-4xl text-primary block mb-2">account_balance_wallet</span>
                                <p class="text-sm font-semibold text-slate-700 dark:text-slate-300">Your Qraytek Wallet</p>
                                <p class="text-2xl font-black text-primary mt-1">$250.00</p>
                                <p class="text-xs text-slate-400 mt-1">Available balance</p>
                            </div>
                        </div>

                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                        class="w-full py-4 bg-primary text-white font-bold rounded-xl hover:bg-primary/90 transition-colors flex items-center justify-center gap-3 text-base shadow-lg shadow-primary/20">
                        <span class="material-symbols-outlined">lock</span>
                        Pay ${{ number_format($booking->price, 2) }} — Confirm Booking
                    </button>

                    <p class="text-center text-xs text-slate-400 flex items-center justify-center gap-1 mt-2">
                        <span class="material-symbols-outlined text-sm">security</span>
                        Secured payment · SSL encrypted
                    </p>

                </form>

            </div>

            {{-- Right: Booking Summary --}}
            <div class="lg:col-span-2 space-y-4">

                {{-- Session Summary --}}
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6 sticky top-8">
                    <h3 class="font-bold mb-5">Booking Summary</h3>

                    {{-- Teacher --}}
                    <div class="flex items-center gap-3 mb-5 pb-5 border-b border-slate-100 dark:border-slate-700">
                        <div class="size-12 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold">
                            {{ strtoupper(substr($booking->teacher->personne->name, 0, 2)) }}
                        </div>
                        <div>
                            <p class="font-bold">{{ $booking->teacher->personne->name }}</p>
                            <p class="text-xs text-slate-500">{{ $booking->teacher->subject }}</p>
                        </div>
                    </div>

                    {{-- Details --}}
                    <div class="space-y-3 text-sm mb-5">
                        <div class="flex justify-between">
                            <span class="text-slate-500 flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-sm">calendar_today</span> Date
                            </span>
                            <span class="font-semibold">{{ \Carbon\Carbon::parse($booking->date)->format('D, M d Y') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500 flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-sm">schedule</span> Time
                            </span>
                            <span class="font-semibold">{{ $booking->time }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500 flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-sm">timelapse</span> Duration
                            </span>
                            <span class="font-semibold">{{ $booking->duration }} minutes</span>
                        </div>
                        @if($booking->topic)
                        <div class="flex justify-between">
                            <span class="text-slate-500 flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-sm">topic</span> Topic
                            </span>
                            <span class="font-semibold text-right max-w-[140px]">{{ $booking->topic }}</span>
                        </div>
                        @endif
                        @if($booking->course)
                        <div class="flex justify-between">
                            <span class="text-slate-500 flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-sm">menu_book</span> Course
                            </span>
                            <span class="font-semibold text-right max-w-[140px]">{{ $booking->course->title }}</span>
                        </div>
                        @endif
                    </div>

                    {{-- Price Breakdown --}}
                    <div class="border-t border-slate-100 dark:border-slate-700 pt-4 space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-slate-500">Rate</span>
                            <span>${{ number_format($booking->teacher->hourly_rate, 2) }}/hr</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Duration</span>
                            <span>{{ $booking->duration / 60 }}h</span>
                        </div>
                        <div class="flex justify-between font-black text-base pt-2 border-t border-slate-100 dark:border-slate-700">
                            <span>Total</span>
                            <span class="text-primary">${{ number_format($booking->price, 2) }}</span>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<script>
// ─── Payment method toggle ──────────────────────────
document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
    radio.addEventListener('change', function() {
        document.getElementById('card-fields').classList.add('hidden');
        document.getElementById('mobile-fields').classList.add('hidden');
        document.getElementById('wallet-fields').classList.add('hidden');

        if (this.value === 'card')         document.getElementById('card-fields').classList.remove('hidden');
        if (this.value === 'mobile_money') document.getElementById('mobile-fields').classList.remove('hidden');
        if (this.value === 'wallet')       document.getElementById('wallet-fields').classList.remove('hidden');
    });
});

// ─── Card number formatting ─────────────────────────
function formatCard(input) {
    let val = input.value.replace(/\D/g, '').substring(0, 16);
    input.value = val.replace(/(.{4})/g, '$1 ').trim();
}

// ─── Expiry formatting ──────────────────────────────
function formatExpiry(input) {
    let val = input.value.replace(/\D/g, '').substring(0, 4);
    if (val.length >= 2) val = val.substring(0, 2) + '/' + val.substring(2);
    input.value = val;
}
</script>

@endsection
