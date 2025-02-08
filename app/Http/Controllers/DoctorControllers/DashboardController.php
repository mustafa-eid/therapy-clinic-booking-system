<?php

namespace App\Http\Controllers\DoctorControllers;

use App\Http\Controllers\Controller;
use App\Repositories\DashboardRepository;

class DashboardController extends Controller
{
    protected $dashboardRepo;

    public function __construct(DashboardRepository $dashboardRepo)
    {
        $this->dashboardRepo = $dashboardRepo;
    }

    public function index()
    {
        $data = $this->dashboardRepo->getDashboardData();
        return view('frontend.doctorDashboard', $data);
    }
}
