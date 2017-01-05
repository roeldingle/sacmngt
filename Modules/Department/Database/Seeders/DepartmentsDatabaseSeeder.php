<?php

namespace Modules\Role\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Modules\Role\Entities\Department;


class DepartmentsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        $department = new Department();
        $department->name = 'IT';
        $department->description = 'Information Technology Department';
        $department->is_active = true;
        $department->save();

        $department = new Department();
        $department->name = 'HR';
        $department->description = 'Human Resources Department';
        $department->is_active = true;
        $department->save();

        $department = new Department();
        $department->name = 'CT';
        $department->description = 'Creative Technology';
        $department->is_active = true;
        $department->save();
    }
}
