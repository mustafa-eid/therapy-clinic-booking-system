<?php

namespace App\Repositories;

interface MedicalRecordRepositoryInterface
{
    public function getPatientMedicalRecords($patientId);
    public function checkForExistingRecord($patientId);
}
