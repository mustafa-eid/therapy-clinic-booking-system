<?php

namespace App\Repositories;

interface StaffRepositoryInterface
{
    public function getAllStaff();

    public function registerStaff($request);

    public function destroyStaff($id);
}
