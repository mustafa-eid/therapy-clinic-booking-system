<?php

namespace App\Http\Controllers\DoctorControllers;

use App\Repositories\PatientRepository;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    protected $patientRepo;

    public function __construct(PatientRepository $patientRepo)
    {
        $this->patientRepo = $patientRepo;
    }

    public function getAllPatients()
    {
        return $this->patientRepo->getAllPatients();
    }
}
