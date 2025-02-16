<?php

namespace App\Http\Controllers\PatientControllers;

use Carbon\Carbon;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookSessionController extends Controller
{
    public function index()
    {
        $AvailableTimings = TimeSlot::all();
        $today = Carbon::now()->toDateString();
        $groupedSlots = [];

        foreach ($AvailableTimings as $slot) {
            $date = Carbon::parse($slot->date)->toDateString();
            if ($date >= $today) {
                $groupedSlots[$date][] = $slot;
            }
        }

        ksort($groupedSlots);

        return view('frontend.book-session', compact('AvailableTimings', 'groupedSlots'));
    }
}
