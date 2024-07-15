<?php

namespace App\Console\Commands;

use App\Jobs\SendPrayNow;
use Illuminate\Console\Command;

class PrayNow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pray:now';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        SendPrayNow::dispatch();
    }
}
