<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Mail\SendSupplierReport;
use App\Models\RawMaterialsPurchaseOrder;

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
        $reportDate = now()->format('Y-m-d-H:i:s');
        $pendingOrdersCount= RawMaterialsPurchaseOrder::where('status', 'pending')->count();
        $deliveredCount = RawMaterialsPurchaseOrder::where('status', 'delivered')->count();
        $confirmedCount = RawMaterialsPurchaseOrder::where('status', 'confirmed')->count();
        $cancelledCount = RawMaterialsPurchaseOrder::where('status', 'cancelled')->count();
        $totalCount = RawMaterialsPurchaseOrder::count();
        $this->info('Executing the supplier report command...');
        Mail::to('josephotai209@gmail.com')->send(new SendSupplierReport());
    }
}