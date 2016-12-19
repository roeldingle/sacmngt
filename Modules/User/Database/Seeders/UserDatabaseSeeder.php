<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Modules\User\Entities\User;
use Modules\User\Entities\Department;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        self::createDepartment();

        $user = new User();
        $user->role_id = 1;
        $user->department_id = 3;
        $user->email = 'rmdingle@straightarrow.com.ph';
        $user->password = bcrypt("secret");
        $user->is_active = 1;
    }


    public function createDepartment(){

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
