<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class AttributeSelectValue extends Model
{
      protected $fillable = [
            'attribute_id',
            'unique_key',
            'value'
	];

    public function attribute() {
        return $this->belongsTo("App\Admin\Attribute");
    }
}
