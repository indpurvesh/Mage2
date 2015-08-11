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

    public function getCategoryTree($parentId = 0)
    {

        $cats = array();
        $resultSet = $this->where('parent_category_id', '=', $parentId)->get();
        foreach ($resultSet as $result) {
            //if($result->parent_category_id > 0) {
            $cats[$result->id] = $result;
            //}

            if (count($this->where('parent_category_id', '=', $result->id)->get())) {
                $childs = $this->getCategoryTree($result->id);
                //if($result->parent_category_id > 0) {
                $cats[$result->id] = array(
                    '0' => $result,
                    'child' => $childs
                );
                //}
            }
        }
        return $cats;
    }
}
