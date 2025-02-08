<?php

namespace App\Repositories;

use App\Models\TimeSlot;

class AvailableTimingsRepository implements AvailableTimingsRepositoryInterface
{
    public function getAllSlots()
    {
        return view('frontend.available-timings', ['slots' => TimeSlot::all()]);
    }

    public function addSlot(array $data)
    {
        if ($this->checkIfSlotExists($data['date'], $data['start_time'], $data['end_time'])) {
            return redirect()->back()->with('error', 'The selected time slot already exists for this date!');
        }

        TimeSlot::create($data);

        return redirect()->route('available-timings')->with('success', 'Slot added successfully!');
    }

    public function checkIfSlotExists($date, $startTime, $endTime)
    {
        return TimeSlot::where('date', $date)
            ->where('start_time', $startTime)
            ->where('end_time', $endTime)
            ->exists();
    }
}
