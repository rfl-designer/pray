<?php

use Illuminate\Support\Facades\{Schedule};

Schedule::command('pray:now')->everyThirtyMinutes();
Schedule::command('queue:work --stop-when-empty')->everyThirtyMinutes();
