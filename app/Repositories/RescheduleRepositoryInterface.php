<?php

namespace App\Repositories;

interface RescheduleRepositoryInterface
{
    public function handleRescheduleTimeSlot($request);
    public function acceptReschedule($rescheduleId);
    public function rejectReschedule($rescheduleId);
    public function getAllReschedules();
    public function destroyReschedule($request);
}
