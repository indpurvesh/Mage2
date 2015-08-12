<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'category_product';
    protected $fillable = [
        'product_id',
        'category_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Admin\Product');
    }

    public function category()
    {
        return $this->belongsTo('App\Admin\Category');
    }
}
