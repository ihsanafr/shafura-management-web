<?php

use App\Models\Contact;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Foundation\Console\ClosureCommand;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    /** @var ClosureCommand $this */
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

//Schedule delete All deleted data at sundays.
Schedule::call(function() {

    Product::onlyTrashed()->forceDelete();
    Customer::onlyTrashed()->forceDelete();
    Contact::onlyTrashed()->forceDelete();
    Service::onlyTrashed()->forceDelete();

})->sundays();
