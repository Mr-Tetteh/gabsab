<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeServiceData extends Model
{
    protected $fillable = ['name','price','quantity','advantage_1' ,'advantage_2', 'advantage_3', 'advantage_4', 'advantage_5',
        'advantage_6', 'advantage_7', 'advantage_8', 'advantage_9', 'advantage_10'];
}
