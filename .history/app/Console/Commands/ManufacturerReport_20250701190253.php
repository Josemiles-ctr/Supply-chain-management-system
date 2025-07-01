<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\SendManufacturerReport;
use Illuminate\Support\Facades\Mail;

class ManufacturerReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:manufacturer-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Executing the manufacturer report command...');
        Mail::to('josephotai209@gmail.com')->send(new SendManufacturerReport($user,$deliveredCount));
    }
}