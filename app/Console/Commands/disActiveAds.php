<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Advertisement;
use Illuminate\Console\Command;


class disActiveAds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ads:active';

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
        // \Log::info("Cron is working fine!");

        $now = Carbon::now();
        $ads = Advertisement::where('is_active',1)->get();
        foreach ($ads as $ad)
        {
            $date = new Carbon($ad->end_date);
            if ($now >= $date)
            {
                $ad->is_active = 0;
                $ad->save();
            }
        }
    }
}
