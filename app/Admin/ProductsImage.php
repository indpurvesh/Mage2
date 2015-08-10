<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductsImage extends Model
{
    protected $fillable = [
        'path',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Admin\Product');
    }
}
