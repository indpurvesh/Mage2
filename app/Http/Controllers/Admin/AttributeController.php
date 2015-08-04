<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Attribute;
use App\Admin\Entity;
use Illuminate\Http\Request;
use App\Admin\AttributeSelectValue;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AttributeController extends Controller {

    //'text','select','checkbox','radio','file'
    public $attributeType = ['text' => 'Text', 'select' => 'Select', 'checkbox' => 'Checkbox', 'radio' => 'Radio', 'file' => 'File'];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $attributes = Attribute::all();
        return view('admin.attribute.index')->with('attributes', $attributes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $entities = Entity::lists('name', 'id');
        $attributeKey = strtolower(str_random(6));
        return view('admin.attribute.create')->with('entities', $entities)
                        ->with('types', $this->attributeType)
                        ->with('attributeKey', $attributeKey);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $attribute = Attribute::create($request->all());
        $selects = $request->get('select');
        foreach ($selects as $key => $select) {
            $select['attribute_id'] = $attribute->id;
            if (is_int($key)) {
                //update here 
            } else {
                AttributeSelectValue::create($select);
            }
        }
        //return true;
        return redirect('/admin/attribute');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $attribute = Attribute::findorfail($id);
        $entities = Entity::lists('name', 'id');
        $attributeKey = strtolower(str_random(6));
        return view('admin.attribute.edit')->with('entities', $entities)
                        ->with('types', $this->attributeType)
                        ->with('attributeKey', $attributeKey)
                        ->with('attribute', $attribute);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $attribute = Attribute::findorfail($id);
        $attribute->update($request->all());
        $selects = $request->get('select');
        foreach ($selects as $id => $select) {
            $select['attribute_id'] = $attribute->id;
            if (is_int($id)) {
                $attributeSelectValue = AttributeSelectValue::findorfail($id);
                $attributeSelectValue->update($select);
            } else {
                AttributeSelectValue::create($select);
            }
        }
        //return true;
        return redirect('/admin/attribute');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
