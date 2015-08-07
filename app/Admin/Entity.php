<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $fillable = [
            'name',
            'unique_key'
	];
    
    
    public function scopeProduct() {
        return $this->where('unique_key','product');
    }
    
    public function scopeCategory() {
        return $this->where('unique_key','category');
    }
    
    public function attributes() {
        return $this->hasMany('App\Admin\Attribute');
    }
}
