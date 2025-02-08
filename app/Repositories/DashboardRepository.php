<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\TimeSlot;
use App\Models\Medication;
use App\Models\Reschedule;

class DashboardRepository implements DashboardRepositoryInterface
{
    public function getDashboardData()
    {
        $today = Carbon::today();

        return [
            'totalPatients' => Patient::count(),
            'totalTimeSlots' => TimeSlot::count(),
            'todayTimeSlots' => TimeSlot::whereDate('date', $today)->count(),
            'currentMonthTimeSlots' => TimeSlot::whereMonth('date', Carbon::now()->month)->count(),
            'previousMonthTimeSlots' => TimeSlot::whereMonth('date', Carbon::now()->subMonth()->month)->count(),
            'monthChange' => $this->calculatePercentageChange(
                TimeSlot::whereMonth('date', Carbon::now()->subMonth()->month)->count(),
                TimeSlot::whereMonth('date', Carbon::now()->month)->count()
            ),
            'totalBookings' => Booking::count(),
            'confirmedBookings' => Booking::where('status', 'confirmed')->count(),
            'cancelledBookings' => Booking::where('status', 'cancelled')->count(),
            'pendingBookings' => Booking::where('status', 'pending')->count(),
            'todayBookings' => Booking::whereDate('booking_date', $today)->count(),
            'currentMonthBookings' => Booking::whereMonth('booking_date', Carbon::now()->month)->count(),
            'previousMonthBookings' => Booking::whereMonth('booking_date', Carbon::now()->subMonth()->month)->count(),
            'bookingMonthChange' => $this->calculatePercentageChange(
                Booking::whereMonth('booking_date', Carbon::now()->subMonth()->month)->count(),
                Booking::whereMonth('booking_date', Carbon::now()->month)->count()
            ),
            'totalInvoices' => Invoice::count(),
            'todayInvoices' => Invoice::whereDate('invoice_date', $today)->count(),
            'currentMonthInvoices' => Invoice::whereMonth('invoice_date', Carbon::now()->month)->count(),
            'previousMonthInvoices' => Invoice::whereMonth('invoice_date', Carbon::now()->subMonth()->month)->count(),
            'invoiceMonthChange' => $this->calculatePercentageChange(
                Invoice::whereMonth('invoice_date', Carbon::now()->subMonth()->month)->count(),
                Invoice::whereMonth('invoice_date', Carbon::now()->month)->count()
            ),
            'totalReschedules' => Reschedule::count(),
            'todayReschedules' => Reschedule::whereDate('date', $today)->count(),
            'currentMonthReschedules' => Reschedule::whereMonth('date', Carbon::now()->month)->count(),
            'totalMedications' => Medication::count(),
            'todayMedications' => Medication::whereDate('start_date', $today)->count(),
            'currentMonthMedications' => Medication::whereMonth('start_date', Carbon::now()->month)->count(),
        ];
    }

    private function calculatePercentageChange($previous, $current)
    {
        return $previous > 0 ? (($current - $previous) / $previous) * 100 : 0;
    }
}
