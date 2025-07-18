<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
// Schedule::command('sample:command')->everyMinute(); 
Schedule::command('app:manufacturer-report')->everyWeek();
Schedule::command('app:supplier-report')->weekly();