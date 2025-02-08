<?php

namespace App\Repositories;

use App\Models\Booking;
use App\Models\Reschedule;
use App\Mail\RescheduleMail;
use Illuminate\Support\Facades\Mail;

class RescheduleRepository implements RescheduleRepositoryInterface
{
    public function handleRescheduleTimeSlot($request)
    {
        $bookingData = Booking::with('patient', 'timeSlot')->get();
        foreach ($bookingData as $booking) {
            $patientEmail = $booking->patient->email;
            $startTime = $booking->timeSlot->start_time;
            $endTime = $booking->timeSlot->end_time;
        }

        // Check if reschedule already exists
        $existingReschedule = Reschedule::where('patient_id', $booking->patient->id)
            ->where('old_time_slot_id', $booking->timeSlot->id)
            ->first();

        if ($existingReschedule) {
            $this->sendRescheduleMail($patientEmail, $startTime, $endTime, $existingReschedule->id, $existingReschedule->status);
            return redirect()->back()->with('info', 'The email has been resent.');
        }

        // Store data in reschedules table if not exists
        $reschedule = new Reschedule();
        $reschedule->patient_id = $booking->patient->id;
        $reschedule->old_time_slot_id = $booking->timeSlot->id;
        $reschedule->date = $request->date;
        $reschedule->start_time = $request->start_time;
        $reschedule->end_time = $request->end_time;
        $reschedule->status = 'pending';
        $reschedule->save();

        // Send mail to patient
        $this->sendRescheduleMail($patientEmail, $startTime, $endTime, $reschedule->id, $reschedule->status);

        return redirect()->back()->with('success', 'Mail was sent to patient, wait for their action.');
    }

    public function acceptReschedule($rescheduleId)
    {
        $reschedule = Reschedule::find($rescheduleId);
        if ($reschedule && $reschedule->status === 'pending') {
            $reschedule->status = 'accepted';
            $reschedule->save();
        }

        return view('emails.reschedule', [
            'startTime' => $reschedule->start_time,
            'endTime' => $reschedule->end_time,
            'rescheduleId' => $reschedule->id,
            'status' => $reschedule->status,
        ]);
    }

    public function rejectReschedule($rescheduleId)
    {
        $reschedule = Reschedule::find($rescheduleId);
        if ($reschedule && $reschedule->status === 'pending') {
            $reschedule->status = 'rejected';
            $reschedule->save();
        }

        return view('emails.reschedule', [
            'startTime' => $reschedule->start_time,
            'endTime' => $reschedule->end_time,
            'rescheduleId' => $reschedule->id,
            'status' => $reschedule->status,
        ]);
    }

    public function getAllReschedules()
    {
        $reschedules = Reschedule::with(['patient', 'oldTimeSlot'])
            ->where('status', 'accepted')
            ->paginate(5);

        return view('frontend.reschedules', compact('reschedules'));
    }

    public function destroyReschedule($request)
    {
        $id = $request->input('id');
        $reschedule = Reschedule::find($id);
        if ($reschedule) {
            $reschedule->delete();
            return redirect()->back()->with('success', 'Reschedule deleted successfully!');
        }
        return redirect()->back()->with('error', 'Reschedule not found!');
    }

    private function sendRescheduleMail($patientEmail, $startTime, $endTime, $rescheduleId, $status)
    {
        Mail::to($patientEmail)->send(new RescheduleMail($startTime, $endTime, $rescheduleId, $status));
    }
}
