<?php

namespace App\Models;

use App\Models\Medication;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PatientVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $guard = 'patient';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'gender',
        'age',
        'birthday',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function reschedules()
    {
        return $this->hasMany(Reschedule::class);
    }

    public function medications()
    {
        return $this->belongsToMany(Medication::class, 'patient_medications');
    }

    public function getMedicationDetails()
    {
        return $this->medications()->get();
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birthday' => 'date',
            'questions' => 'array',
        ];
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new PatientVerifyEmail());
    }
}
