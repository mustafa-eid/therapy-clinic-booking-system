<?php

namespace App\Repositories;

interface AppointmentRepositoryInterface
{
    public function getAppointmentsByPatientId($patientId);
    public function cancelAppointment($appointmentId, $patientId);
}
