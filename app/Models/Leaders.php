<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leaders extends Model
{
    protected $fillable = ['first_name', 'last_name', 'other_names', 'position', 'department', 'image'];
}
