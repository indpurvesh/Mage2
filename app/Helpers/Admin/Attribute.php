<?php
namespace App\Helpers\Admin;

use App\Admin\AttributeSelectValue;
use App\Admin\ProductsTextValue;
use App\Admin\ProductsVarcharValue;

class Attribute
{


    public static function renderAttribute($attribute, $entityId = 0)
    {

        $value = "";

        $html = "";
        switch ($attribute->type) {
            case 'text':

                if ($entityId > 0) {
                    $value = ProductsVarcharValue::where('entity_id', '=',$entityId)->where('attribute_id', '=' ,$attribute->id)->get()->first();

                }

                $html .= "<div class='form-group'>";
                $html .= "<label>{$attribute->name}</label>";
                $html .= "<input type='text' name='attribute[{$attribute->id}][value]' vallue='{$value}' class='form-control' />";
                $html .= "</div>";
                break;
            case 'textarea':

                if ($entityId > 0) {
                    $model = ProductsTextValue::where('entity_id',$entityId)->where('attribute_id', '=' ,$attribute->id)->get()->first();
                    $value = (isset($model->value)) ? $model->value : "";
                }
                $html .= "<div class='form-group'>";
                $html .= "<label>{$attribute->name}</label>";
                $html .= "<textarea name='attribute[{$attribute->id}][value]' class='form-control'>{$value}";
                $html .= "</textarea>";
                $html .= "</div>";
                break;
            case 'select':
                $options = AttributeSelectValue::where('attribute_id', $attribute->id)->get()->lists('value', 'unique_key');

                $html .= "<div class='form-group'>";
                $html .= "<label>{$attribute->name}</label>";
                $html .= "<select name='attribute[{$attribute->id}][value]' class='form-control' >";
                foreach ($options as $key => $label) {
                    $html .= "<option value='{$key}' >{$label}</option>";
                }
                $html .= "</select>";
                $html .= "</div>";
                break;
            case 'radio':
                $html .= "<div class='form-group'>";
                $html .= "<label>{$attribute->name}</label>";
                $html .= "<input type='radio' name='attribute[{$attribute->id}][value]' vallue='{$value}' class='form-control' />";
                $html .= "</div>";
                break;
            case 'checkbox':
                $html .= "<div class='form-group'>";
                $html .= "<label>{$attribute->name}</label>";
                $html .= "<input type='checkbox' name='attribute[{$attribute->id}][value]' vallue='{$value}' class='form-control' />";
                $html .= "</div>";
                break;
        }

        return $html;

    }
}