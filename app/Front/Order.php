<?php

namespace App\Front;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'shipping_address_id',
        'billing_address_id',
        'shipping_type',
        'payment_type',
        'note'
    ];
}
