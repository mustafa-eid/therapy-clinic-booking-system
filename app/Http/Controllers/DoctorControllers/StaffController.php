<?php

namespace App\Http\Controllers\DoctorControllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\StaffRepository;

class StaffController extends Controller
{
    protected $staffRepo;

    public function __construct(StaffRepository $staffRepo)
    {
        $this->staffRepo = $staffRepo;
    }

    public function index()
    {
        $result = $this->staffRepo->getAllStaff();

        return $result;
    }

    public function addTeamMember(Request $request)
    {
        $result = $this->staffRepo->registerStaff($request);

        return $result;
    }

    public function destroyTeamMember($id)
    {
        $result = $this->staffRepo->destroyStaff($id);

        return $result;
    }

    public function updateTeamMember(Request $request)
    {
        $result = $this->staffRepo->updateStaff($request);

        return $result;
    }
}
