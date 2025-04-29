<?php

namespace App\Http\Controllers;

use App\Models\ContactCustomer;
use App\Models\ListCustomer;
use App\Models\Product;
use App\Models\ServiceCustomer;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

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

    public function sendEmail() {

        //send mail
        Mail::to(config('mail.mailers.resend.resend_to'))->send(new TestMail());

        return redirect('/')->with('success', 'email already sent');

    }
}
