<?php

namespace App\Http\Controllers\DoctorControllers;

use Illuminate\Http\Request;
use App\Repositories\PatientMedicationsRepository;
use App\Http\Controllers\Controller;

class PatientMedicationsController extends Controller
{
    protected $patientMedicationsRepo;

    public function __construct(PatientMedicationsRepository $patientMedicationsRepo)
    {
        $this->patientMedicationsRepo = $patientMedicationsRepo;
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'medication_names' => 'required|array',
            'medication_names.*' => 'exists:medications,id',
        ]);

        return $this->patientMedicationsRepo->storeMedications($request->patient_id, $request->medication_names);
    }
}
