<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientMedication extends Model
{
    use HasFactory;

    protected $table = 'patient_medications';

    protected $fillable = [
        'patient_id',
        'medication_id',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function medication()
    {
        return $this->belongsTo(Medication::class);
    }
    
}
