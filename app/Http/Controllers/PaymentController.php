<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PaymentController extends Controller
{

    public function checkout($bookingId)
    {
        $booking = Booking::with(['teacher.personne', 'course'])
            ->where('student_id', Auth::user()->id)
            ->where('status', 'pending')
            ->findOrFail($bookingId);

        return view('payment.checkout', compact('booking'));
    }


    public function process(Request $request)
    {
        $request->validate([
            'booking_id'    => 'required|exists:bookings,id',
            'payment_method' => 'required|in:card,mobile_money,wallet',
            'card_number'   => 'required_if:payment_method,card',
            'card_name'     => 'required_if:payment_method,card',
            'card_expiry'   => 'required_if:payment_method,card',
            'card_cvv'      => 'required_if:payment_method,card',
            'phone_number'  => 'required_if:payment_method,mobile_money',
        ]);

        $booking = Booking::where('student_id', Auth::user()->id)
            ->where('status', 'pending')
            ->findOrFail($request->booking_id);

        Payment::create([
            'booking_id'     => $booking->id,
            'amount'         => $booking->price,
            'method'         => $request->payment_method,
            'status'         => 'paid',
            'transaction_id' => 'TXN-' . strtoupper(Str::random(10)),
        ]);

        $booking->update(['status' => 'confirmed']);

        return redirect()->route('payment.success')
            ->with('booking_id', $booking->id);
    }
    public function success()
    {
        $bookingId = session('booking_id');

        $booking = null;
        if ($bookingId) {
            $booking = Booking::with(['teacher.personne', 'course', 'payment'])
                ->find($bookingId);
        }

        return view('payment.success', compact('booking'));
    }

    
    public function failed()
    {
        return view('payment.failed');
    }
}
