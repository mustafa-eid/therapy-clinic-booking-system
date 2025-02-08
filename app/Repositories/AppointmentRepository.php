<?php

namespace App\Repositories;

use App\Models\Booking;
use App\Models\Cancelled;
use Illuminate\Support\Facades\Auth;

class AppointmentRepository implements AppointmentRepositoryInterface
{
    public function getAppointmentsByPatientId($patientId)
    {
        return Booking::where('patient_id', $patientId)->get();
    }

    public function cancelAppointment($appointmentId, $patientId)
    {
        $booking = Booking::find($appointmentId);

        $cancel = new Cancelled();
        $cancel->patient_id = $patientId;
        $cancel->slot_time_id = $appointmentId;
        $cancel->canceled_at = now();
        $cancel->save();

        $user = Auth::guard('patient')->user();
        $cancelByName = $user->name;
        $booking->cancelBooking('Patient: ' . $cancelByName);

        return $booking;
    }
}
