<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Mail\SendSupplierReport;

class SupplierReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:supplier-report';

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
        $supplier = User::where('role', 'supplier')->first();
        $reportDate =
        $this->info('Executing the supplier report command...');
        Mail::to('josephotai209@gmail.com')->send(new SendSupplierReport());
    }
}