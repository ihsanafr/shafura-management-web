<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListCustomer extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'customer_code',
        'website_url',
        'phone'
    ];

    protected $table = 'list_customers';
}
