<?php

namespace App\Repositories;

use App\Models\Booking;
use App\Models\TimeSlot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BookingRepository implements BookingRepositoryInterface
{
    public function findExistingBooking($id)
    {
        return Booking::where('time_slot_id', $id)->first();
    }

    public function bookTimeSlot($id)
    {
        $timeSlot = TimeSlot::find($id);
        if ($timeSlot) {
            $timeSlot->is_booked = 1;
            $timeSlot->save();
        }
    }

    public function createBooking($id, $patientId)
    {
        $booking = new Booking();
        $booking->patient_id = $patientId;
        $booking->time_slot_id = $id;
        $booking->booking_date = now();
        $booking->save();
    }

    public function checkBookingAndRedirect($id)
    {
        $existingBooking = $this->findExistingBooking($id);
        if ($existingBooking) {
            return Redirect::route('patient.myfatoorah')->with('info', 'This booking is already booked. Please make payment now to complete the process.');
        }
        return null;
    }
}
