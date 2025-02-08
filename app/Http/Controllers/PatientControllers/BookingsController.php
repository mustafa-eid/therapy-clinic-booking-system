<?php

namespace App\Http\Controllers\PatientControllers;

use App\Http\Controllers\Controller;
use App\Repositories\BookingRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class BookingsController extends Controller
{
    protected $bookingRepository;

    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function bookTimSlot($id)
    {
        $redirectResponse = $this->bookingRepository->checkBookingAndRedirect($id);
        if ($redirectResponse) {
            return $redirectResponse;
        }

        // Make the time slot booked
        $this->bookingRepository->bookTimeSlot($id);

        // Save the booking in the bookings table
        $this->bookingRepository->createBooking($id, Auth::guard('patient')->user()->id);

        return redirect()->route('patient.myfatoorah')->with('success', 'Booking successfully made.');
    }
}
