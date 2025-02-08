<?php

namespace App\Repositories;

interface AvailableTimingsRepositoryInterface
{
    public function getAllSlots();

    public function addSlot(array $data);

    public function checkIfSlotExists($date, $startTime, $endTime);
}
