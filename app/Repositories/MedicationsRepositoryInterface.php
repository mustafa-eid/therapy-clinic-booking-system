<?php

namespace App\Repositories;

interface MedicationsRepositoryInterface
{
    public function getAllMedications();

    public function storeMedication(array $data);

    public function deleteMedication($id);

    public function editMedication($id);

    public function updateMedication(array $data);
}
