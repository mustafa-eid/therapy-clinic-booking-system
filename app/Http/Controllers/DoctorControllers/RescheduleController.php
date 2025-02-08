<?php

namespace App\Http\Controllers\DoctorControllers;

use App\Repositories\RescheduleRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RescheduleController extends Controller
{
    protected $rescheduleRepo;

    public function __construct(RescheduleRepository $rescheduleRepo)
    {
        $this->rescheduleRepo = $rescheduleRepo;
    }

    public function rescheduleTimeSlot(Request $request)
    {
        // Delegate logic to the repository
        $result = $this->rescheduleRepo->handleRescheduleTimeSlot($request);
        
        return $result;
    }

    public function acceptReschedule($rescheduleId)
    {
        // Delegate logic to the repository
        $result = $this->rescheduleRepo->acceptReschedule($rescheduleId);

        return $result;
    }

    public function rejectReschedule($rescheduleId)
    {
        // Delegate logic to the repository
        $result = $this->rescheduleRepo->rejectReschedule($rescheduleId);

        return $result;
    }

    public function getAllReschedules()
    {
        // Delegate logic to the repository
        $result = $this->rescheduleRepo->getAllReschedules();

        return $result;
    }

    public function destroyReschedule(Request $request)
    {
        // Delegate logic to the repository
        $result = $this->rescheduleRepo->destroyReschedule($request);
        
        return $result;
    }
}
