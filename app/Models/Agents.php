<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agents extends Model
{
    protected $fillable = ['firstname', 'lastname', 'phone', 'email', 'username'];
}
