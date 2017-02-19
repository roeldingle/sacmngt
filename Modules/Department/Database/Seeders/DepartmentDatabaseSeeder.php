<?php

namespace Modules\Department\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Modules\Department\Entities\Department;


class DepartmentDatabaseSeeder extends Seeder
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

        $department = new Department();
        $department->name = 'CD';
        $department->description = 'Creative Design';
        $department->is_active = true;
        $department->save();

        $department = new Department();
        $department->name = 'MS';
        $department->description = 'Marketing Services';
        $department->is_active = true;
        $department->save();
    }
}
