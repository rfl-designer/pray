<?php

use Illuminate\Support\Facades\{Schedule};

Schedule::command('pray:now')->everyMinute();
Schedule::command('queue:work --stop-when-empty')->everyMinute();
