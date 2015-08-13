<?php

namespace App\Front;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'customer_id',
        'type',
        'number',
        'street',
        'area',
        'city',
        'state',
        'zip_code',
        'country'
    ];

    public function scopeBilling()
    {
        $this->where('type', '=', 'BILLING');
    }
}
