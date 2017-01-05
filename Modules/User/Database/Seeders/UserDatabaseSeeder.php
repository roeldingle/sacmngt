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

        $user = new User();
        $user->role_id = 1;
        $user->department_id = 3;
        $user->email = 'rmdingle@straightarrow.com.ph';
        $user->password = bcrypt("secret");
        $user->is_active = 1;
    }


}
