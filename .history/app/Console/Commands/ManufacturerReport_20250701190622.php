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
        $user = User::where('role', 'manufacturer')->first();
        if (!$user) {
            $this->error('No manufacturer user found.');
            return;
        }
        $deliveredCount = ::where('status', 'delivered')->count();
        $this->info('Executing the manufacturer report command...');
        Mail::to('josephotai209@gmail.com')->send(new SendManufacturerReport($user,$deliveredCount, $pendingCount, $confirmedCount, $cancelledCount, $totalCount,$still, $low,$out));
    }
}