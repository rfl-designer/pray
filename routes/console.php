<?php

use App\Jobs\SendPrayNow;
use Illuminate\Support\Facades\{Schedule};

Schedule::job(new SendPrayNow())->everyMinute();
Schedule::command('queue:work --stop-when-empty')->everyMinute();
