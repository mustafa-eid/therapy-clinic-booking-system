<?php

namespace App\Models;

use App\Models\Patient;
use App\Models\TimeSlot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reschedule extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'patient_id',
        'old_time_slot_id',
        'status',
        'date',
        'start_time',
        'end_time',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function oldTimeSlot()
    {
        return $this->belongsTo(TimeSlot::class, 'old_time_slot_id');
    }
}
