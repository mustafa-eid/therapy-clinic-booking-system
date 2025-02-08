<?php

namespace App\Repositories;

interface RequestRepositoryInterface
{
    public function getAllBookings();
    public function getRescheduleStatuses();
    public function confirmBooking($bookingId);
    public function cancelBooking($bookingId);
}
