<?php

namespace Modules\Team\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Modules\Team\Entities\Team;


class TeamDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        $team = new Team();
        $team->department_id = 1;
        $team->name = 'IT AU';
        $team->description = 'IT team in morning shift';
        $team->is_active = true;
        $team->save();


    }
}
