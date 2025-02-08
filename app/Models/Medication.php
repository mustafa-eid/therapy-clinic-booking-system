<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    protected $table = 'medications';

    protected $fillable = [
        'medication_name',
        'start_date',
        'end_date',
        'quantity',
        'frequency',
        'repetitionOfDay',
        'dose',
        'notes',
    ];
}
