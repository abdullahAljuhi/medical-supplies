<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Order;
use App\Events\Messages;
use Illuminate\Console\Command;

class periodOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:period';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

       /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now();
        $orders = Order::where('is_periodic',1)->get();
        foreach ($orders as $order)
        {
            // $period = $order->created_at->addDays($order->period);
            $period = $order->created_at->addMinutes($order->period);
            // addHour()
            // addMinutes()
            if ($now >= $period)
            {
                $order->is_periodic = '0';
                $order->save();
                $new_order = new Order();
                $new_order->products = $order->products;
                $new_order->user_id = $order->user_id;
                $new_order->address = $order->address;
                $new_order->type = $order->type;
                $new_order->pharmacy_id = $order->pharmacy_id;
                $new_order->is_periodic = 1;
                $new_order->period = $order->period;
                $new_order->save();
                    // send notification for user who send order
            event(new Messages($new_order, $order->user_id));
            }
        }

        $this->info('Demo:Cron Cummand Run successfully!');
    }
}
