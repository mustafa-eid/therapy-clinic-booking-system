<?php

namespace App\Repositories;

use App\Models\Medication;
use App\Models\Patient;

class MedicationsRepository implements MedicationsRepositoryInterface
{
    public function getAllMedications()
    {
        return view('frontend.medical-records', [
            'patients' => Patient::all(),
            'Medications' => Medication::paginate(5)
        ]);
    }

    public function storeMedication(array $data)
    {
        Medication::create($data);
        return redirect()->back()->with('success', 'Medication added successfully');
    }

    public function deleteMedication($id)
    {
        $record = Medication::find($id);

        if ($record) {
            $record->delete();
            return redirect()->back()->with('success', 'Medication deleted successfully');
        }

        return redirect()->back()->with('error', 'Medication not found');
    }

    public function editMedication($id)
    {
        $record = Medication::with('patient')->findOrFail($id);
        return view('frontend.medical_records_edit', compact('record'));
    }

    public function updateMedication(array $data)
    {
        $Medication = Medication::findOrFail($data['id']);
        $Medication->update($data);

        return redirect()->back()->with('success', 'Medication updated successfully');
    }
}
