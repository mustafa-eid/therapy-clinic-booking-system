<?php

namespace App\Repositories;

interface RolesAndPermissionsRepositoryInterface
{
    public function addPermissions();

    public function getAllRoles();

    public function getPermissionsAndUsersForRoleCreation();

    public function createRole($request);

    public function getRoleForEditing($id);

    public function updateRole($request);

    public function deleteRole($id);
}
