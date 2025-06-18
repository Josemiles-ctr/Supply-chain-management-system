<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorDashboardController extends Controller
{
    public function index()
    {
        $vendor = Auth::guard('vendor')->user();
        return view('inventory.vendor_dashboard', compact('vendor'));
    }
}
