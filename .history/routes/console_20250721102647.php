<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
Schedule::command('send:supplier-report')
             ->weekly()
             ->at('07:00')
             ->timezone(config('app.timezone'));

Schedule::command('send:manufacturer-report')
             ->weekly()
             ->at('07:00')
             ->timezone(config('app.timezone'));