<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = ['package', 'duration', 'number', 'amount', 'quantity', 'reference', 'user_id'];


    protected static function booted()
    {
        static::creating(function ($reference) {
            $reference->reference = $reference->generateReferenceNumber();
        });
    }

    public function generateReferenceNumber()
    {
        $length = 14;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $uniqueRefNumber = '';

        for ($i = 0; $i < $length; $i++) {
            $uniqueRefNumber .= $characters[random_int(0, strlen($characters) - 1)];
        }

        // Check if the generated patient number already exists in the database
        while (Data::where('reference', $uniqueRefNumber)->exists()) {
            $uniqueRefNumber = '';
            for ($i = 0; $i < $length; $i++) {
                $uniqueRefNumber .= $characters[random_int(0, strlen($characters) - 1)];
            }
        }

        return $uniqueRefNumber;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
