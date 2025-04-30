<?php

namespace App\Http\Controllers;

use App\Models\ContactCustomer;
use App\Models\ListCustomer;
use App\Models\Product;
use App\Models\ServiceCustomer;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        //info count in dashboard
        $count  = [
            "product" => Product::count(),
            'customer' => ListCustomer::count(),
            'service' => ServiceCustomer::count(),
            'contact' => ContactCustomer::count()
        ];

        //get the latest products
        $products = Product::latest()->first();

        //get the latest customers
        $customers = ListCustomer::latest()->first();

        //get the upcoming events
        $events = Event::where('start', '>=', date('Y-m-d'))->orderBy('start')->take(5)->get();

        //return dashboard pages
        return view('pages.dashboard', compact(['count', 'products', 'customers', 'events']));
    }

    // sendEmail (ignore because it's for testing only)
    public function sendEmail() {

        //send mail
        Mail::to(config('mail.mailers.resend.resend_to'))->send(new TestMail());

        //return homepage with notifications
        return redirect('/')->with('success', 'email already sent');

    }
}
