<?php

namespace App\Events;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Messages implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;
    public $id;
    public $date;
    public $time;
    public $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($order,$id,$message)
    {
        $this->order = $order;
        $this->id=$id;
        $this->message=$message;
        $this->receiver=User::find($id);
        $this->date = date("Y-m-d", strtotime(Carbon::now()));
        $this->time = date("h:i A", strtotime(Carbon::now()));
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        
        return ['order'.$this->id];

    }
}
