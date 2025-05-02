<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactCustomer extends Model
{
    use SoftDeletes;
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
