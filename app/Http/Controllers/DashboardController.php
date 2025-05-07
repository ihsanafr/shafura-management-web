<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Event;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        //info count in dashboard
        $count  = [
            "product" => Product::count(),
            'customer' => Customer::count(),
            'service' => Service::count(),
            'contact' => Contact::count()
        ];

        //get the latest product
        $product = Product::latest()->first();

        //get the latest customer
        $customer = Customer::latest()->first();

        //get the upcoming events
        $events = Event::where('start', '>=', date('Y-m-d'))
            ->orderBy('start')
            ->take(5)
            ->get();

        //get the invoices due
        $invoices = Service::whereDate('end_date', '>=', now())
            ->whereDate('end_date', '<=', now()->addWeek())
            ->orderBy('end_date', 'asc')
            ->take(5)
            ->get();

        $eventCheck = Event::latest()->first();

        $compactedData = ['count', 'product', 'customer', 'events', 'eventCheck', 'invoices'];

        //return dashboard pages
        return view('pages.dashboard', compact($compactedData));
    }

    // sendEmail (ignore because it's for testing only)
    public function sendEmail()
    {

        //send mail
        Mail::to(config('mail.mailers.resend.resend_to'))->send(new TestMail());

        //return homepage with notifications
        return redirect('/')->with('success', 'email already sent');
    }
}
