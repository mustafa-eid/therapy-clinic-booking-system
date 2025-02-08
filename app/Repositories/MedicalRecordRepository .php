<?php

namespace App\Repositories;

use App\Models\PatientMedication;
use Illuminate\Support\Facades\Redirect;

class MedicalRecordRepository implements MedicalRecordRepositoryInterface
{
    public function getPatientMedicalRecords($patientId)
    {
        return PatientMedication::with('medication')
            ->where('patient_id', $patientId)
            ->get();
    }

    public function checkForExistingRecord($patientId)
    {
        // Example: Check if the patient has no records
        $records = $this->getPatientMedicalRecords($patientId);
        if ($records->isEmpty()) {
            return Redirect::route('patient.noRecords')->with('info', 'No medical records found for this patient.');
        }
        return null;  // No redirection needed
    }
}
