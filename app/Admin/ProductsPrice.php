<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductsPrice extends Model
{
    protected $fillable = ['product_id', 'qty', 'sale_price'];

    public function product()
    {
        return $this->belongsTo('App\Admin\Product');
    }
}
