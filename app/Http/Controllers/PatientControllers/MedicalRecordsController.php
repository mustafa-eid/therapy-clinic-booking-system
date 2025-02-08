<?php

namespace App\Http\Controllers\PatientControllers;

use Illuminate\Http\Request;
use App\Repositories\MedicalRecordRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MedicalRecordsController extends Controller
{
    protected $medicalRecordRepository;

    public function __construct(MedicalRecordRepositoryInterface $medicalRecordRepository)
    {
        $this->medicalRecordRepository = $medicalRecordRepository;
    }

    public function medicalRecords()
    {
        $redirectResponse = $this->medicalRecordRepository->checkForExistingRecord(Auth::guard('patient')->user()->id);
        if ($redirectResponse) {
            return $redirectResponse;
        }

        $medicalRecords = $this->medicalRecordRepository->getPatientMedicalRecords(Auth::guard('patient')->user()->id);

        return view('frontend.my-medical_records', compact('medicalRecords'));
    }
}
