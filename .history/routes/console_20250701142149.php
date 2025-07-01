<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');Schedule::command('sample:command', function () {
    $this->info('Executing the sample command...');
    $count = \App\Models\User::count();
    $this->info("Total number of users: {$count}");
    Mail::to('example@example.com')->send(new \App\Mail\SampleMail($count));