<?php

namespace App\Models;

use App\Models\Booking;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'amount',
        'payment_method',
        'status',
        'payment_date'
    ];

    // Relationship with the Booking model
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    // Relationship with the Invoice model
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
