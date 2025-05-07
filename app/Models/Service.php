<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'type',
        'company_name',
        'title',
        'products',
        'start_date',
        'end_date'
    ];

    public $timestamps = false;
}
