<?php

use App\Models\ContactCustomer;
use App\Models\ListCustomer;
use App\Models\Product;
use App\Models\ServiceCustomer;
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
    ListCustomer::onlyTrashed()->forceDelete();
    ContactCustomer::onlyTrashed()->forceDelete();
    ServiceCustomer::onlyTrashed()->forceDelete();

})->sundays();
