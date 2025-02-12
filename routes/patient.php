<?php

use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyFatoorahController;
use App\Http\Controllers\PatientAuth\RegisteredUserController;
use App\Http\Controllers\PatientControllers\BookingsController;
use App\Http\Controllers\PatientAuth\EmailVerificationController;
use App\Http\Controllers\PatientAuth\AuthenticatedSessionController;
use App\Http\Controllers\PatientControllers\MedicalRecordsController;
use App\Http\Controllers\PatientControllers\MyAppointmentsController;
use App\Http\Controllers\PatientControllers\ProfileSettingsController;

// Group routes for guest users (registration & login)
Route::prefix('patient')->name('patient.')->middleware('guest')->group(function () {
    // Registration routes
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    // Login routes
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');
    Route::get('email/verify', [EmailVerificationController::class, 'show'])->name('verification.notice');
    Route::post('email/resend', [EmailVerificationController::class, 'resend'])->middleware('guest')->name('verification.send');
});

// Group routes for authenticated patients
Route::prefix('patient')->name('patient.')->middleware(['patient-auth'])->group(function () {

    // Patient dashboard
    Route::get('dashboard', function () {
        return view('frontend.patient-dashboard');
    })->name('dashboard');

    // Logout route
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Booking a time slot
    Route::post('book-tim-slot/{id}', [BookingsController::class, 'bookTimSlot'])->name('book-tim-slot');

    // MyFatoorah payment gateway checkout
    Route::get('myfatoorah', [MyFatoorahController::class, 'checkout'])->name('myfatoorah');

    // Appointment management
    Route::get('my-appointments', [MyAppointmentsController::class, 'myAppointments'])->name('my-appointments');
    Route::patch('appointment/cancel', [MyAppointmentsController::class, 'cancelAppointment'])->name('cancel-appointments');

    // Fetching and displaying invoices for the authenticated patient
    Route::get('my-invoices', function () {
        $patientId = Auth::guard('patient')->user()->id;
        $myInvoices = Invoice::where('patient_id', $patientId)->get();
        return view('frontend.my-invoices', compact('myInvoices'));
    })->name('my-invoices');

    // Profile settings routes
    Route::get('profile-settings', [ProfileSettingsController::class, 'profileSettings'])->name('profile-settings');
    Route::post('profile-settings/update', [ProfileSettingsController::class, 'updateProfile'])->name('profile-settings-update');

    // Password change routes
    Route::get('change/password', [ProfileSettingsController::class, 'changePassword'])->name('change-password');
    Route::post('update/password', [ProfileSettingsController::class, 'updatePassword'])->name('update-password');

    // Medical records route
    Route::get('medical-records', [MedicalRecordsController::class, 'medicalRecords'])->name('medical-records');

    // Patient questionnaire page
    Route::get('quesissions', function () {
        return view('frontend.patient-quesissions');
    })->name('questions');
});
