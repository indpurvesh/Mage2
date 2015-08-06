<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductsTextValue extends Model
{
    protected $fillable = [
        'entity_id',
        'attribute_id',
        'value'
    ];
}
