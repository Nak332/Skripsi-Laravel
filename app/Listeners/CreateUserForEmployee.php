<?php

namespace App\Listeners;

use App\Events\EmployeeCreated;
use App\Models\Employees;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class CreateUserForEmployee
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\EmployeeCreated  $event
     * @return void
     */
    public function handle(EmployeeCreated $event)
    {


        $emp = $event->employee;
        $stringtotime = strtotime($emp->employee_DOB);
        $changeformat = date('d-m-Y', $stringtotime);
        $deletestrip = explode('-',$changeformat);
        $addstring = implode("", $deletestrip);
        $username = $emp->employee_name . $addstring;
        $user = new User();
        $user->name = $username;
        $user->employee_id = $emp->id;
        $user->role = $emp->employee_job;
        $user->email = $emp->employee_email;
        $user->password = bcrypt('test');
        $user->save();
    }
}
