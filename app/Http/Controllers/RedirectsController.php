<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectsController extends Controller
{

    public function redirectToDashboard()
    {
        $user = Auth::user();
    
        switch ($user->user_type) {
            case 'admin':
                return view('dashboards.admin');
            case 'vendor':
                return view('dashboards.vendor');
            case 'manufacturer':
                return view('dashboards.manufacturer');
            case 'customer':
                return view('dashboards.customer');
            default:
                // Redirect to a default page or handle the case where user_type is not recognized
                return redirect('/')->with('error', 'User type not recognized.');
        }
    }
    
}