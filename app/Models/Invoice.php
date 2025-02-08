<?php

namespace App\Models;

use App\Models\Payment;
use App\Models\Patient;
use App\Models\TimeSlot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'payment_id',
        'slot_id',
        'amount',
        'status',
        'description',
        'invoice_date'
    ];

    // Relationship with the Patient model
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Relationship with the Payment model
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    // Relationship with the TimeSlot model
    public function slot()
    {
        return $this->belongsTo(TimeSlot::class, 'slot_id');
    }

    protected $casts = [
        'invoice_date' => 'datetime',
    ];
}
