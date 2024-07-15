<?php

namespace App\Jobs;

use App\Models\{Pray, User};
use App\Notifications\PushDemo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\{InteractsWithQueue, SerializesModels};
use Illuminate\Support\Facades\{Log, Notification};

class SendPrayNow implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            $pray = Pray::select('id', 'body', 'ref')->inRandomOrder()->first();
            Notification::send($user, new PushDemo($pray->id, $pray->body, $pray->ref));
            Log::info('send');
        }
    }
}
