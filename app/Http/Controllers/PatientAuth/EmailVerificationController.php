<?php

namespace App\Http\Controllers\PatientAuth;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use Dotenv\Store\File\Paths;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

class EmailVerificationController extends Controller
{
    /**
     * Show the email verification notice.
     */
    public function show()
    {
        return view('auth.verify-email');
    }

    /**
     * Mark the authenticated user's email as verified.
     */
    public function verify(EmailVerificationRequest $request): RedirectResponse
    {
        $user = $request->user('patient');

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('patient.dashboard')->with('message', 'Your email is already verified.');
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return redirect()->route('patient.dashboard')->with('success', 'Your email has been successfully verified!');
    }
}
