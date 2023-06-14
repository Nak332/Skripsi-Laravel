<?php

namespace App\Events;

use App\Models\RekamMedis;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateTransaction
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $rekam;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(RekamMedis $rekam)
    {
        $this->rekam = $rekam;
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
