<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Log;

class PatientVerifyEmail extends VerifyEmail
{
    public function toMail($notifiable)
    {
        if (!$notifiable || !$notifiable->getKey()) {
            // Log the error or handle the situation where $notifiable is null
            Log::error('The notifiable object is null or invalid in PatientVerifyEmail notification');
            return (new MailMessage)
                ->subject('Verify Your Email Address')
                ->line('There was an error processing your verification request.');
        }

        return (new MailMessage)
            ->subject('Verify Your Email Address')
            ->line('Click the button below to verify your email and access your dashboard.')
            ->action('Verify Email', $this->verificationUrl($notifiable))
            ->line('If you did not create an account, no further action is required.');
    }
    /**
     * Customize the verification URL to match the desired route.
     */
    protected function verificationUrl($notifiable)
    {
        if (!$notifiable instanceof \App\Models\Patient) {
            return url('/'); 
        }

        return url(route('patient.verification.verify', [
            'id' => $notifiable->id,
            'hash' => sha1($notifiable->getEmailForVerification())
        ], false));
    }
}
