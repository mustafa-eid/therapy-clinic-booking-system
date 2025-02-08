<?php

namespace App\Repositories;

use App\Models\PatientMedication;

class PatientMedicationsRepository implements PatientMedicationsRepositoryInterface
{
    public function storeMedications($patientId, $medicationIds)
    {
        foreach ($medicationIds as $medicationId) {
            PatientMedication::create([
                'patient_id' => $patientId,
                'medication_id' => $medicationId,
            ]);
        }

        return redirect()->back()->with('success', 'Medications successfully added.');
    }
}
