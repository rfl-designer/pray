<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

\Illuminate\Support\Facades\Schedule::command('pray:now')->everyMinute();

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();
