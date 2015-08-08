<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'slug',
        'sku',
        'brief_description',
        'description',
        'qty',
        'manage_stock',
        'low_stock_notification'
    ];
    public function Attribute() {
        return $this->hasMany('App\Admin\Attribute');
    }
}
