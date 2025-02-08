<?php

namespace App\Providers;

use App\Repositories\StaffRepository;
use App\Repositories\BookingRepository;
use App\Repositories\InvoiceRepository;
use App\Repositories\PatientRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\ProfileRepository;
use App\Repositories\RequestRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\DashboardRepository;
use App\Repositories\RescheduleRepository;
use App\Repositories\AppointmentRepository;
use App\Repositories\MedicationsRepository;
use App\Repositories\StaffRepositoryInterface;
use App\Repositories\AvailableTimingsRepository;
use App\Repositories\BookingRepositoryInterface;
use App\Repositories\InvoiceRepositoryInterface;
use App\Repositories\PatientRepositoryInterface;
use App\Repositories\PaymentRepositoryInterface;
use App\Repositories\ProfileRepositoryInterface;
use App\Repositories\RequestRepositoryInterface;
use App\Repositories\DashboardRepositoryInterface;
use App\Repositories\PatientMedicationsRepository;
use App\Repositories\RescheduleRepositoryInterface;
use App\Repositories\RolesAndPermissionsRepository;
use App\Repositories\AppointmentRepositoryInterface;
use App\Repositories\MedicationsRepositoryInterface;
use App\Repositories\MedicalRecordRepositoryInterface;
use App\Repositories\MedicalRecordRepository;
use App\Repositories\AvailableTimingsRepositoryInterface;
use App\Repositories\PatientMedicationsRepositoryInterface;
use App\Repositories\RolesAndPermissionsRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(AppointmentRepositoryInterface::class, AppointmentRepository::class);
        $this->app->bind(AvailableTimingsRepositoryInterface::class, AvailableTimingsRepository::class);
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
        $this->app->bind(DashboardRepositoryInterface::class, DashboardRepository::class);
        $this->app->bind(InvoiceRepositoryInterface::class, InvoiceRepository::class);
        $this->app->bind(MedicalRecordRepositoryInterface::class, MedicalRecordRepository::class);
        $this->app->bind(MedicationsRepositoryInterface::class, MedicationsRepository::class);
        $this->app->bind(PatientMedicationsRepositoryInterface::class, PatientMedicationsRepository::class);
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
        $this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);
        $this->app->bind(RequestRepositoryInterface::class, RequestRepository::class);
        $this->app->bind(RescheduleRepositoryInterface::class, RescheduleRepository::class);
        $this->app->bind(RolesAndPermissionsRepositoryInterface::class, RolesAndPermissionsRepository::class);
        $this->app->bind(StaffRepositoryInterface::class, StaffRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
