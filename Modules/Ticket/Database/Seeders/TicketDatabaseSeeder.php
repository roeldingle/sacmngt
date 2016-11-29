<?php

namespace Modules\Ticket\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Modules\Ticket\Entities\Ticket;
use Modules\Ticket\Entities\Department;
use Modules\Ticket\Entities\Status;
use Modules\Ticket\Entities\Priority;


class TicketDatabaseSeeder extends Seeder
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
        self::createTicketStatus();
        self::createTicketSPriority();
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


    }

    public function createTicketStatus(){

        $status = new Status();
        $status->name = 'open';
        $status->description = 'Open status';
        $status->is_active = true;
        $status->save();

        $status = new Status();
        $status->name = 'pending';
        $status->description = 'Open status';
        $status->is_active = true;
        $status->save();

        $status = new Status();
        $status->name = 'close';
        $status->description = 'Open status';
        $status->is_active = true;
        $status->save();

    }

    public function createTicketSPriority(){

        $priority = new Priority();
        $priority->name = 'low';
        $priority->description = 'Open status';
        $priority->is_active = true;
        $priority->save();

        $priority = new Priority();
        $priority->name = 'medium';
        $priority->description = 'Open status';
        $priority->is_active = true;
        $priority->save();

        $priority = new Priority();
        $priority->name = 'high';
        $priority->description = 'Open status';
        $priority->is_active = true;
        $priority->save();
    }
}
