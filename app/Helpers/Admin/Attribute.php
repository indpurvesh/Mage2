<?php
namespace App\Helpers\Admin;


use App\Admin\AttributeSelectValue;
class Attribute
{


    public static function renderAttribute($attribute) {
           $html = "";
            switch($attribute->type) {
                case 'text':
                    $html .= "<div class='form-group'>";
                    $html .= "<label>{$attribute->name}</label>";
                    $html .= "<input type='text' name='attribute[{$attribute->id}][{$attribute->unique_key}]' vallue='' class='form-control' />";
                    $html .= "</div>";
                break;
            case 'textarea':
                    $html .= "<div class='form-group'>";
                    $html .= "<label>{$attribute->name}</label>";
                    $html .= "<textarea name='attribute[{$attribute->id}][{$attribute->unique_key}]' class='form-control'>";
                    $html .= "</textarea>";
                    $html .= "</div>";
                break;
            case 'select':
                    $options = AttributeSelectValue::where('attribute_id',$attribute->id)->get()->lists('value','unique_key');
                    
                    $html .= "<div class='form-group'>";
                    $html .= "<label>{$attribute->name}</label>";
                    $html .= "<select name='attribute[{$attribute->id}][{$attribute->unique_key}]' class='form-control' >";
                    foreach($options as $key => $label) {
                        $html .= "<option value='{$key}'>{$label}</option>";
                    }
                    $html .= "</select>";
                    $html .= "</div>";
                break;
            case 'radio':
                    $html .= "<div class='form-group'>";
                    $html .= "<label>{$attribute->name}</label>";
                    $html .= "<input type='radio' name='attribute[{$attribute->id}][{$attribute->unique_key}]' vallue='' class='form-control' />";
                    $html .= "</div>";
                break;
            case 'checkbox':
                    $html .= "<div class='form-group'>";
                    $html .= "<label>{$attribute->name}</label>";
                    $html .= "<input type='checkbox' name='attribute[{$attribute->id}][{$attribute->key}]' vallue='' class='form-control' />";
                    $html .= "</div>";
                break;
            }
            
            return $html;

    }
}