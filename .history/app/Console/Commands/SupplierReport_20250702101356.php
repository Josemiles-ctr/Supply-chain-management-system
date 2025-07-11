<?php

namespace App\Console\Commands;

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
    $supplier = User::where('role', 'supplier')->first();
        // if (!$supplier) {
        //     $this->error('No supplier user found.');
        //     return;
        // }
        // if ($supplier->isEmpty()) {
        //     $this->supplier= [
        //         'name' => 'Supplier',
        //         'email' => 'supplier@example.com',
        //     ];
    {
        $this->info('Executing the supplier report command...');
        Mail::to('josephotai209@gmail.com')->send(new SendSupplierReport());
    }
}