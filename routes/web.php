<?php

use Carbon\Carbon;
use App\Models\TimeSlot;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DoctorControllers\StaffController;
use App\Http\Controllers\DoctorControllers\InvoiceController;
use App\Http\Controllers\DoctorControllers\PatientController;
use App\Http\Controllers\DoctorControllers\PaymentController;
use App\Http\Controllers\DoctorControllers\RequestController;
use App\Http\Controllers\DoctorControllers\DashboardController;
use App\Http\Controllers\DoctorControllers\RescheduleController;
use App\Http\Controllers\DoctorControllers\MedicationsController;
use App\Http\Controllers\DoctorControllers\AvailableTimingsController;
use App\Http\Controllers\DoctorControllers\PatientMedicationsController;
use App\Http\Controllers\DoctorControllers\RolesAndPermissionsController;

Route::get('/', function () {
    $AvailableTimings = TimeSlot::all();
    $dates = [];
    for ($i = 0; $i < 7; $i++) {
        $dates[] = Carbon::now()->addDays($i)->toDateString();
    }
    return view('frontend.home', compact('AvailableTimings', 'dates'));
})->name('home');

Route::get('/cPanel',  [DashboardController::class, 'index'])->middleware('verified')->name('dashboard');

Route::prefix('cPanel')->middleware('auth:web')->group(function () {

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('permission:Profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('permission:Update Profile');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware('permission:Delete Profile');

    // Patient routes
    Route::get('/my-patients', [PatientController::class, 'getAllPatients'])->name('my-patients')->middleware('permission:My Patients');

    // Available Timing routes
    Route::get('/available-timings', [AvailableTimingsController::class, 'addAvailableTiming'])->name('available-timings')->middleware('permission:Available Timings');
    Route::post('/storeAvailableTiming', [AvailableTimingsController::class, 'storeAvailableTiming'])->name('storeAvailableTiming')->middleware('permission:Add Available Timings');

    // Request routes
    Route::get('/all-bookings', [RequestController::class, 'getAllRequests'])->name('requests')->middleware('permission:Bookings');
    Route::post('/bookings/confirm', [RequestController::class, 'makeRequestConfirmed'])->name('bookings.confirm')->middleware('permission:Confirm Bookings');
    Route::post('/bookings/cancel/{bookingId}', [RequestController::class, 'cancelRequest'])->name('bookings.cancel')->middleware('permission:cancel Bookings');

    // Invoice routes
    Route::get('/invoices', [InvoiceController::class, 'getAllInvoice'])->name('invoices')->middleware('permission:Invoices');
    Route::get('/invoices-overview', [InvoiceController::class, 'invoicesOverview'])->name('invoices-overview');
    Route::delete('/invoices/delete', [InvoiceController::class, 'destroyInvoice'])->name('invoices.destroy')->middleware('permission:Delete Invoices');
    Route::put('/invoices/update/{invoice}', [InvoiceController::class, 'updateInvoice'])->name('invoices.update')->middleware('permission:Update Invoices');
    Route::post('/invoices/store', [InvoiceController::class, 'storeInvoice'])->name('invoices.store')->middleware('permission:Add Invoices');

    // Payment routes
    Route::get('/payments', [PaymentController::class, 'payments'])->name('payments')->middleware('permission:Payments');
    Route::delete('/payment/delete', [PaymentController::class, 'destroyPayment'])->name('payment.delete')->middleware('permission:Delete Payments');

    // Medical record routes
    Route::get('/all-medications', [MedicationsController::class, 'Medications'])->name('medical-records')->middleware('permission:Medications');
    Route::post('/medical-records/store', [MedicationsController::class, 'storeMedication'])->name('medical_records.store')->middleware('permission:Add Medications');
    Route::post('/medical-records/delete', [MedicationsController::class, 'deleteMedication'])->name('medical_records.delete')->middleware('permission:Delete Medications');
    Route::put('/medical-records/update', [MedicationsController::class, 'updateMedication'])->name('medical_records.update')->middleware('permission:Update Medications');
    Route::post('/medications', [PatientMedicationsController::class, 'store'])->name('medications.store');

    // Booking reschedule
    Route::post('/bookings/reschedule', [RescheduleController::class, 'rescheduleTimeSlot'])->name('reschedule-timeSlot')->middleware('permission:Reschedules');
    Route::get('/accept-reschedule/{bookingId}', [RescheduleController::class, 'acceptReschedule'])->middleware('permission:Accept Reschedules');
    Route::get('/reject-reschedule/{bookingId}', [RescheduleController::class, 'rejectReschedule'])->middleware('permission:Reject Reschedules');
    Route::get('/reschedules', [RescheduleController::class, 'getAllReschedules'])->name('reschedules');
    Route::delete('/reschedule/delete', [RescheduleController::class, 'destroyReschedule'])->name('reschedule.delete')->middleware('permission:Delete Reschedules');

    // team members routes
    Route::get('/team-members', [StaffController::class, 'index'])->name('staff')->middleware('permission:Staff Show');
    Route::post('/team/register', [StaffController::class, 'addTeamMember'])->name('staff.register')->middleware('permission:Staff add');
    Route::delete('/team/destroy/{id}', [StaffController::class, 'destroyTeamMember'])->name('staff.destroy')->middleware('permission:Staff delete');
    Route::put('/team/update', [StaffController::class, 'updateTeamMember'])->name('staff.update');

    // Roles and Permissions
    Route::get('/add-permission', [RolesAndPermissionsController::class, 'addPermissions']);
    Route::get('/show-roles', [RolesAndPermissionsController::class, 'show'])->middleware('permission:Show Roles And Permissions');
    Route::get('/create-roles', [RolesAndPermissionsController::class, 'createRole'])->middleware('permission:CreateRole Roles And Permissions');
    Route::post('/add-role', [RolesAndPermissionsController::class, 'create'])->middleware('permission:Create Roles And Permissions');
    Route::get('/edit-role/{id}', [RolesAndPermissionsController::class, 'editRole'])->middleware('permission:EditRole Roles And Permissions');
    Route::post('/update-role', [RolesAndPermissionsController::class, 'updateRole'])->middleware('permission:UpdateRole Roles And Permissions');
    Route::delete('/delete-role/{id}', [RolesAndPermissionsController::class, 'delete'])->middleware('permission:Delete Roles And Permissions');

});

require __DIR__ . '/auth.php';
require __DIR__ . '/patient.php';
