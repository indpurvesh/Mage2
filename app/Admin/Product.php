<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'sku'
    ];
    public function Attribute() {
        return $this->hasMany('App\Admin\Attribute');
    }
}
