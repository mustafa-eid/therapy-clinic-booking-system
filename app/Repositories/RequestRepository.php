<?php

namespace App\Repositories;

use App\Models\Booking;
use App\Models\Cancelled;
use App\Models\Reschedule;
use Illuminate\Support\Facades\Auth;

class RequestRepository implements RequestRepositoryInterface
{
    public function getAllBookings()
    {
        return Booking::with(['patient', 'timeSlot'])
            ->where('status', '!=', 'cancelled')
            ->paginate(5);
    }

    public function getRescheduleStatuses()
    {
        return Reschedule::select('status')->get()->pluck('status')->toArray();
    }

    public function confirmBooking($bookingId)
    {
        $booking = Booking::find($bookingId);

        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found');
        }

        if ($booking->isConfirmed()) {
            return redirect()->back()->with('info', 'Booking is already confirmed');
        }

        $booking->confirmBooking();

        return redirect()->back()->with('success', 'Booking confirmed successfully');
    }

    public function cancelBooking($bookingId)
    {
        $booking = Booking::find($bookingId);

        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found');
        }

        if ($booking->status === 'cancelled') {
            return redirect()->back()->with('info', 'Booking is already cancelled');
        }

        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to cancel a booking');
        }

        $cancel = new Cancelled();
        $cancel->patient_id = Auth::guard('web')->user()->id;
        $cancel->slot_time_id = $bookingId;
        $cancel->canceled_at = now();
        $cancel->save();

        $cancelByName = $user->name;
        $booking->cancelBooking('D: ' . $cancelByName);

        return redirect()->back()->with('success', 'Booking cancelled successfully');
    }
}
