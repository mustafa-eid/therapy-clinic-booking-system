<?php

namespace App\Repositories;

interface BookingRepositoryInterface
{
    public function findExistingBooking($id);
    public function bookTimeSlot($id);
    public function createBooking($id, $patientId);
    public function checkBookingAndRedirect($id);
}
