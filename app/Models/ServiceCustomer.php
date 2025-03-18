<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCustomer extends Model
{
    protected $fillable = [
        'type',
        'company_name',
        'title',
        'products'
    ];

    protected $table = 'service_customers';
}
