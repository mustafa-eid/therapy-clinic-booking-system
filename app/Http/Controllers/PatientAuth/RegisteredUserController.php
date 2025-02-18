<?php

namespace App\Http\Controllers\PatientAuth;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('PatientAuth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:patients,email', 'regex:/^[\w\.-]+@([\w-]+\.)+[\w-]{2,4}$/'],
            'phone' => ['required', 'string', 'max:15', 'regex:/^(01)[0-2,5][0-9]{8}$/'],
            'gender' => ['required', 'in:Male,Female'],
            'age' => ['required', 'integer', 'min:1'],
            'birthday' => ['required', 'date'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $patient = Patient::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'age' => $request->age,
            'birthday' => $request->birthday,
            'password' => Hash::make($request->password),
        ]);
        $patient->sendEmailVerificationNotification();
        Auth::guard('patient')->login($patient);
        return redirect()->route('patient.verification.notice');
    }
}
