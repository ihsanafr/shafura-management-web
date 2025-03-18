<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListCustomer extends Model
{
    protected $fillable = [
        'name',
        'customer_code',
        'website_url',
        'phone'
    ];

    protected $table = 'list_customers';
}
