<?php

namespace App\Models;

use App\Models\Patient;
use App\Models\TimeSlot;
use Illuminate\Database\Eloquent\Model;

class Cancelled extends Model
{
    protected $table = 'cancellations';

    protected $fillable = [
        'slot_time_id',
        'patient_id',
        'reason',
        'canceled_at',
    ];

    /**
     * Get the associated time slot.
     */
    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class, 'slot_time_id');
    }

    /**
     * Get the associated patient.
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
