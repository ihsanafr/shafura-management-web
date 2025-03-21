<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCustomer extends Model
{
    protected $fillable = [
        'type',
        'company_name',
        'title',
        'products',
        'start_date',
        'end_date'
    ];

    public $timestamps = false;

    protected $table = 'service_customers';
}
