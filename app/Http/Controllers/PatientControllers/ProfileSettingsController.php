<?php

namespace App\Http\Controllers\PatientControllers;

use App\Http\Controllers\Controller;
use App\Repositories\ProfileRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileSettingsController extends Controller
{
    protected $profileRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function profileSettings()
    {
        return view('frontend.profile-settings');
    }

    public function updateProfile(Request $request)
    {
        $patientId = Auth::guard('patient')->user()->id;
        $data = $request->except('_token');

        $result = $this->profileRepository->updateProfile($patientId, $data);

        if ($result !== true) {
            return redirect()->back()->withErrors($result);
        }

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function changePassword()
    {
        return view('frontend.change-password');
    }

    public function updatePassword(Request $request)
    {
        $patientId = Auth::guard('patient')->user()->id;
        $currentPassword = $request->current_password;
        $newPassword = $request->new_password;

        $result = $this->profileRepository->updatePassword($patientId, $currentPassword, $newPassword);

        if ($result !== true) {
            return redirect()->back()->withErrors(['error' => $result]);
        }

        return redirect()->back()->with('success', 'Password updated successfully');
    }
}
