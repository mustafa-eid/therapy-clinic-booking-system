<?php

namespace App\Http\Controllers\DoctorControllers;

use App\Http\Controllers\Controller;
use App\Repositories\RequestRepository;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    protected $requestRepo;

    public function __construct(RequestRepository $requestRepo)
    {
        $this->requestRepo = $requestRepo;
    }

    public function getAllRequests()
    {
        $bookings = $this->requestRepo->getAllBookings();
        $rescheduleStatus = $this->requestRepo->getRescheduleStatuses();

        return view('frontend.requests', compact('bookings', 'rescheduleStatus'));
    }

    public function makeRequestConfirmed(Request $request)
    {
        return $this->requestRepo->confirmBooking($request->input('booking_id'));
    }

    public function cancelRequest($bookingId)
    {
        return $this->requestRepo->cancelBooking($bookingId);
    }
}
