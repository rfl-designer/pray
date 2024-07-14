<?php

namespace App\Console\Commands;

use App\Models\{Pray, User};
use App\Notifications\PushDemo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

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
    public function handle()
    {
        $pray = Pray::query()->select('id', 'body', 'ref')->inRandomOrder()->first();

        Notification::send(User::all(), new PushDemo($pray->id, $pray->body, $pray->ref));
    }
}
