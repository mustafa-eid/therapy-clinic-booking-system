<?php

namespace App\Http\Controllers\DoctorControllers;

use App\Http\Requests\DoctorRequests\StoreAvailableTiming;
use App\Repositories\AvailableTimingsRepository;
use App\Http\Controllers\Controller;

class AvailableTimingsController extends Controller
{
    protected $availableTimingsRepo;

    public function __construct(AvailableTimingsRepository $availableTimingsRepo)
    {
        $this->availableTimingsRepo = $availableTimingsRepo;
    }

    public function addAvailableTiming()
    {
        return $this->availableTimingsRepo->getAllSlots();
    }

    public function storeAvailableTiming(StoreAvailableTiming $request)
    {
        return $this->availableTimingsRepo->addSlot($request->validated());
    }
}
