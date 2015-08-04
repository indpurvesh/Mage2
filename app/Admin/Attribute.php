<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    
     protected $fillable = [
            'entity_id',
            'name',
            'key',
            'type'
	];
}
