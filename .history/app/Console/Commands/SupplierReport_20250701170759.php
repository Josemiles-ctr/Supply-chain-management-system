<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        $this->info('Executing the supplier report command...');
        Mail::to('josephotai209@gmail.com')->send(new SendSupplierReport());
    }
}