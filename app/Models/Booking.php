<?php

namespace App\Models;

use App\Models\Patient;
use App\Models\TimeSlot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'patient_id',
        'time_slot_id',
        'status',
        'booking_date',
        'notes',
        'payment_status',
        'cancelled_by',
    ];


    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class);
    }

    public function isConfirmed()
    {
        return $this->status === 'confirmed';
    }

    public function confirmBooking()
    {
        $this->status = 'confirmed';
        $this->save();
    }

    public function cancelBooking($userId)
    {
        $this->status = 'cancelled';
        $this->cancelled_by = $userId;
        $this->save();
    }

    public function markAsPaid()
    {
        $this->payment_status = 'paid';
        $this->save();
    }

    public function markAsRefunded()
    {
        $this->payment_status = 'refunded';
        $this->save();
    }

    protected $casts = [
        'booking_date' => 'datetime',
    ];
    
}
