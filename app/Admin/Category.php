<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'parent_category_id',
        'description',
        'image_path',
        'status'
    ];
}
