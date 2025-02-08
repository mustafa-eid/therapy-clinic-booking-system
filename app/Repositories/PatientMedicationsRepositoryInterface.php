<?php

namespace App\Repositories;

interface PatientMedicationsRepositoryInterface
{
    public function storeMedications($patientId, $medicationIds);
}
