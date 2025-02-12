<?php

namespace App\Repositories;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolesAndPermissionsRepository implements RolesAndPermissionsRepositoryInterface
{
    public function addPermissions()
    {
        $permissions = [
            'Profile',
            'Update Profile',
            'Delete Profile',
            'My Patients',
            'Available Timings',
            'Add Available Timings',
            'Bookings',
            'Confirm Bookings',
            'Cancel Bookings',
            'Invoices',
            'Add Invoices',
            'Update Invoices',
            'Delete Invoices',
            'Payments',
            'Delete Payments',
            'Medications',
            'Add Medications',
            'Delete Medications',
            'Update Medications',
            'Reschedules',
            'Accept Reschedules',
            'Reject Reschedules',
            'Delete Reschedules',
            'Show Roles And Permissions',
            'CreateRole Roles And Permissions',
            'Create Roles And Permissions',
            'EditRole Roles And Permissions',
            'UpdateRole Roles And Permissions',
            'Delete Roles And Permissions',
            'Staff Show',
            'Staff add',
            'Staff delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign all permissions to Super Admin
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin']);
        $superAdminRole->syncPermissions($permissions);
    }


    public function getAllRoles()
    {
        $roles = Role::all();
        return view('RolesAndPermissions.Index', compact('roles'));
    }

    public function getPermissionsAndUsersForRoleCreation()
    {
        $permissions = Permission::all();
        $users = User::select('name', 'id')->get();
        return view('RolesAndPermissions.CreateRoles', compact('permissions', 'users'));
    }

    public function createRole($request)
    {
        $role = Role::create(['name' => $request->name]);

        foreach ($request->permission as $permission) {
            $role->givePermissionTo($permission);
        }

        foreach ($request->users as $user) {
            $user = User::find($user);
            $user->assignRole($role->name);
        }

        return redirect('cPanel/show-roles');
    }

    public function getRoleForEditing($id)
    {
        $role = Role::where('id', $id)
            ->with('permissions', 'users')
            ->first();
        $permissions = Permission::all();
        $users = User::select('name', 'id')->get();

        return view('RolesAndPermissions.EditRole', compact('role', 'permissions', 'users'));
    }

    public function updateRole($request)
    {
        $role = Role::where('id', $request->id)->first();
        $role->name = $request->name;
        $role->update();

        $role->syncPermissions($request->permission);

        DB::table('model_has_roles')->where('role_id', $request->id)->delete();

        foreach ($request->users as $user) {
            $user = User::find($user);
            $user->assignRole($role->name);
        }

        return redirect('cPanel/show-roles');
    }

    public function deleteRole($id)
    {
        Role::where('id', $id)->delete();
        return redirect('cPanel/show-roles');
    }
}
