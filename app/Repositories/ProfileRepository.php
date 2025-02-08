<?php

namespace App\Repositories;

use App\Models\Patient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileRepository implements ProfileRepositoryInterface
{
    public function updateProfile($patientId, array $data)
    {
        // Validation logic for profile update
        $validator = Validator::make($data, [
            'name' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'phone' => 'nullable|numeric|digits:11',
            'gender' => 'nullable|in:Male,Female',
            'age' => 'nullable|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $patient = Patient::findOrFail($patientId);
        $patient->update($data);

        return true;
    }

    public function updatePassword($patientId, $currentPassword, $newPassword)
    {
        // Validate the new password
        $validator = Validator::make([
            'current_password' => $currentPassword,
            'new_password' => $newPassword,
        ], [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $patient = Patient::findOrFail($patientId);

        if (!Hash::check($currentPassword, $patient->password)) {
            return 'Current password is incorrect';
        }

        $patient->password = Hash::make($newPassword);
        $patient->save();

        return true;
    }
}
