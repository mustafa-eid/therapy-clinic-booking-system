<?php

namespace App\Http\Controllers\PatientAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientAuth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('PatientAuth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $patient = Auth::guard('patient')->user();

        // Check if the patient exists and hasn't verified their email
        if ($patient && !$patient->hasVerifiedEmail()) {
            return redirect()->route('patient.verification.notice');
        }

        // Check if the patient exists and hasn't filled out the questionnaire
        if ($patient && empty($patient->questions)) {
            return redirect()->route('patient.questions');
        }

        return redirect()->intended(route('home', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('patient')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
