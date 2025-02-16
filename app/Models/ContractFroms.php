<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractFroms extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'location', 'ghana_post_gps', 'contract_type', 'status', 'additional_info'];
}
