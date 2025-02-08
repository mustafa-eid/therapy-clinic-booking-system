<?php

namespace App\Http\Controllers\DoctorControllers;

use Illuminate\Http\Request;
use App\Repositories\MedicationsRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequests\StoreMedicationRequest;
use App\Http\Requests\DoctorRequests\UpdateMedicationRequest;

class MedicationsController extends Controller
{
    protected $medicationsRepo;

    public function __construct(MedicationsRepository $medicationsRepo)
    {
        $this->medicationsRepo = $medicationsRepo;
    }

    public function Medications()
    {
        return $this->medicationsRepo->getAllMedications();
    }

    public function storeMedication(StoreMedicationRequest $request)
    {
        return $this->medicationsRepo->storeMedication($request->validated());
    }

    public function deleteMedication(Request $request)
    {
        $request->validate(['id' => 'required|exists:medications,id']);
        return $this->medicationsRepo->deleteMedication($request->id);
    }

    public function editMedication(Request $request)
    {
        return $this->medicationsRepo->editMedication($request->id);
    }

    public function updateMedication(UpdateMedicationRequest $request)
    {
        return $this->medicationsRepo->updateMedication($request->validated());
    }
}
