<?php

namespace App\Repositories;

interface ProfileRepositoryInterface
{
    public function updateProfile($patientId, array $data);
    public function updatePassword($patientId, $currentPassword, $newPassword);
}
