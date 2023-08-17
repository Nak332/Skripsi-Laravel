<?php

namespace App\Events;

use App\Models\Employees;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class EmployeeCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $employee;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Employees $employeess)
    {
        $this->employee = $employeess;
        Log::info('berjalan');
        log::info($this->employee->employee_name);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
