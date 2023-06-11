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
use Illuminate\Support\Facades\Log;

class antrianUpdateFlag
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $rekamedis;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(RekamMedis $rekam)
    {
        $this->rekamedis = $rekam;
        Log::alert('jalan kah?');
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
