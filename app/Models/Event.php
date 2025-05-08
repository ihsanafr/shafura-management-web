<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Agenda model (sorry for not renaming)
class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'start', 'type', 'description'];
}
