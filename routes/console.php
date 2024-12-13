<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('app:check-cart')->everyFiveMinutes();
Schedule::command('app:withdrawal-command')->everyFiveMinutes();

Schedule::command('telescope:prune --hours=48')->daily();



