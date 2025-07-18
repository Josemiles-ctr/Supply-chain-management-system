<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\RawMaterial;
use Illuminate\Console\Command;
use App\Mail\SendManufacturerReport;
use Illuminate\Support\Facades\Mail;
use App\Models\RawMaterialsPurchaseOrder;

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
        $deliveredCount = RawMaterialsPurchaseOrder::where('status', 'delivered')->count();
        $pendingCount = RawMaterialsPurchaseOrder::where('status', 'pending')->count();
        $confirmedCount = RawMaterialsPurchaseOrder::where('status', 'confirmed')->count();
        $cancelledCount = RawMaterialsPurchaseOrder::where('status', 'cancelled')->count();
        $totalCount = RawMaterialsPurchaseOrder::count();
        $still = RawMaterial::where('status', function ($query) {
            $query->where('current_stock', '>', );
        })->count();
        $low = RawMaterial::where('status', 'low')->count();
        $out = RawMaterial::where('status', 'out')->count();

        $this->info('Executing the manufacturer report command...');
        Mail::to('josephotai209@gmail.com')->send(new SendManufacturerReport($user,$deliveredCount, $pendingCount, $confirmedCount, $cancelledCount, $totalCount,$still, $low,$out));
    }
}