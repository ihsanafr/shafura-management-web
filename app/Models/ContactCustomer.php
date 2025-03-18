<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactCustomer extends Model
{
    protected $fillable = [
        'company',
        'name',
        'position',
        'address',
        'email',
        'pic_phone'
    ];

    protected $table = 'contact_customers';
}
