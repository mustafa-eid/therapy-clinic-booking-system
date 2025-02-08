<?php

namespace App\Http\Controllers\PatientControllers;

use App\Http\Controllers\Controller;
use App\Repositories\AppointmentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyAppointmentsController extends Controller
{
    protected $appointmentRepository;

    public function __construct(AppointmentRepositoryInterface $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    public function myAppointments()
    {
        $patientID = Auth::guard('patient')->user()->id;
        $myAppointments = $this->appointmentRepository->getAppointmentsByPatientId($patientID);
        return view('frontend.my-appointments', compact('myAppointments'));
    }

    public function cancelAppointment(Request $request)
    {
        $appointmentId = $request->input('appointment_id');
        $patientID = Auth::guard('patient')->user()->id;

        $this->appointmentRepository->cancelAppointment($appointmentId, $patientID);

        return redirect()->back()->with('success', 'Booking cancelled successfully');
    }
}
