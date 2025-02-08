<?php

namespace App\Http\Controllers\DoctorControllers;

use App\Repositories\RolesAndPermissionsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesAndPermissionsController extends Controller
{
    protected $rolesPermissionsRepo;

    public function __construct(RolesAndPermissionsRepository $rolesPermissionsRepo)
    {
        $this->rolesPermissionsRepo = $rolesPermissionsRepo;
    }

    public function addPermissions(Request $request)
    {
        // Delegate logic to the repository
        $this->rolesPermissionsRepo->addPermissions();

        return redirect()->back()->with('success', 'Permissions added successfully.');
    }

    public function show()
    {
        // Delegate logic to the repository
        return $this->rolesPermissionsRepo->getAllRoles();
    }

    public function createRole()
    {
        // Delegate logic to the repository
        return $this->rolesPermissionsRepo->getPermissionsAndUsersForRoleCreation();
    }

    public function create(Request $request)
    {
        // Delegate logic to the repository
        return $this->rolesPermissionsRepo->createRole($request);
    }

    public function editRole($id)
    {
        // Delegate logic to the repository
        return $this->rolesPermissionsRepo->getRoleForEditing($id);
    }

    public function updateRole(Request $request)
    {
        // Delegate logic to the repository
        return $this->rolesPermissionsRepo->updateRole($request);
    }

    public function delete($id)
    {
        // Delegate logic to the repository
        return $this->rolesPermissionsRepo->deleteRole($id);
    }
}
