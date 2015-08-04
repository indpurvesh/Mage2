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
     
    public function entity() {
        return $this->belongsTo("App\Admin\Entity");
    }
    
    public function AttributeSelectValue() {
        return $this->hasMany('App\Admin\AttributeSelectValue');
    }
}
