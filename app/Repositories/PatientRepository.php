<?php

namespace App\Repositories;

use App\Models\Patient;
use App\Models\Medication;

class PatientRepository implements PatientRepositoryInterface
{
    public function getAllPatients()
    {
        return view('frontend.my-patients', [
            'patients' => Patient::paginate(5),
            'medications' => Medication::all()
        ]);
    }
}
