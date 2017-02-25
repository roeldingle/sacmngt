<?php

namespace Modules\Job\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Modules\Job\Entities\Job;


class JobDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        $team = new Job();
        $team->department_id = 1;
        $team->name = 'IT Manager';
        $team->description = 'Manager for IT';
        $team->is_active = true;
        $team->save();

        $team = new Job();
        $team->department_id = 1;
        $team->name = 'IT TL';
        $team->description = 'Team Leader for IT';
        $team->is_active = true;
        $team->save();

        $team = new Job();
        $team->department_id = 1;
        $team->name = 'IT ATL';
        $team->description = 'Specialist ATL';
        $team->is_active = true;
        $team->save();

        $team = new Job();
        $team->department_id = 1;
        $team->name = 'IT Spec 4';
        $team->description = 'Specialist 4';
        $team->is_active = true;
        $team->save();

        $team = new Job();
        $team->department_id = 3;
        $team->name = 'CT Manager';
        $team->description = 'Manager for CT';
        $team->is_active = true;
        $team->save();

        $team = new Job();
        $team->department_id = 3;
        $team->name = 'CT TL';
        $team->description = 'Team Leader';
        $team->is_active = true;
        $team->save();

        $team = new Job();
        $team->department_id = 3;
        $team->name = 'CT ATL';
        $team->description = 'Assistant Team Leader';
        $team->is_active = true;
        $team->save();

        $team = new Job();
        $team->department_id = 3;
        $team->name = 'CT Spec 4';
        $team->description = 'Specialist 4';
        $team->is_active = true;
        $team->save();




    }
}
