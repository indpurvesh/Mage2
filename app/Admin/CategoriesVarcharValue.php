<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class CategoriesVarcharValue extends Model
{
     protected $fillable = [
        'entity_id',
        'attribute_id',
        'value'
    ];
}
