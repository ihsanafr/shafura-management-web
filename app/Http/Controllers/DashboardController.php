<?php

namespace App\Http\Controllers;

use App\Models\ContactCustomer;
use App\Models\ListCustomer;
use App\Models\Product;
use App\Models\ServiceCustomer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $count  = [
            "product" => Product::count(),
            'customer' => ListCustomer::count(),
            'service' => ServiceCustomer::count(),
            'contact' => ContactCustomer::count()
        ];

        return view('pages.dashboard', compact('count'));
    }
}
