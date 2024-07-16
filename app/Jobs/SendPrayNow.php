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
        Log::info('Handle started: Sending notifications to users.', ['user_count' => $users->count()]);

        foreach ($users as $user) {
            $pray = Pray::query()->select('id', 'body', 'ref')->inRandomOrder()->first();
            Log::info('Selected pray', ['pray_id' => $pray->id]);

            try {
                Notification::send($user, new PushDemo($pray->id, $pray->body, $pray->ref));
                Log::info('Notification sent', ['user_id' => $user->id, 'pray_id' => $pray->id]);
            } catch (\Exception $e) {
                Log::error('Failed to send notification', [
                    'user_id' => $user->id,
                    'error'   => $e->getMessage(),
                ]);
            }
        }
        Log::info('Handle finished: Notifications process completed.');
    }
}
