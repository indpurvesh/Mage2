<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $fillable = [
            'name',
            'key'
	];
    
    
    public function attributes() {
        return $this->hasMany('App\Admin\Attribute');
    }
}
