<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = ['provider', 'phone_number', 'amount', 'user_id'];
}
