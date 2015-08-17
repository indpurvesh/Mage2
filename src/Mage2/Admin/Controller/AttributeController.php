<?php

/*
Copyright (c) 2015, Purvesh
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:

* Redistributions of source code must retain the above copyright notice, this
  list of conditions and the following disclaimer.

* Redistributions in binary form must reproduce the above copyright notice,
  this list of conditions and the following disclaimer in the documentation
and/or other materials provided with the distribution.

* Neither the name of Mage2 nor the names of its
  contributors may be used to endorse or promote products derived from
  this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
    OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/
namespace Mage2\Admin\Controller;

use Mage2\Core\Model\Attribute;
use Mage2\Core\Model\Entity;
use Illuminate\Http\Request;
use Mage2\Core\Model\AttributeSelectValue;
use App\Http\Controllers\Controller;

class AttributeController extends Controller
{

    //'text','select','checkbox','radio','file'
    public $attributeType = ['text' => 'Text', 'textarea' => 'TextArea', 'select' => 'Select', 'checkbox' => 'Checkbox', 'radio' => 'Radio', 'file' => 'File'];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $attributes = Attribute::all();
        return view('mage2::admin.attribute.index')->with('attributes', $attributes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $entities = Entity::lists('name', 'id');
        $attributeKey = strtolower(str_random(6));
        return view('mage2::admin.attribute.create')->with('entities', $entities)
            ->with('types', $this->attributeType)
            ->with('attributeKey', $attributeKey);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $attribute = Attribute::create($request->all());
        $selects = $request->get('select');
        $this->_saveAttributeSelect($selects, $attribute);

        return redirect('/admin/attribute');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $attribute = Attribute::findorfail($id);
        $entities = Entity::lists('name', 'id');
        $attributeKey = strtolower(str_random(6));
        return view('mage2::admin.attribute.edit')->with('entities', $entities)
            ->with('types', $this->attributeType)
            ->with('attributeKey', $attributeKey)
            ->with('attribute', $attribute);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $attribute = Attribute::findorfail($id);
        $attribute->update($request->all());
        $selects = $request->get('select');

        $this->_saveAttributeSelect($selects, $attribute);


        //return true;
        return redirect('/admin/attribute');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Attribute::destroy($id);
        return redirect('/admin/attribute');
    }


    private function _saveAttributeSelect($selects, $attribute)
    {
        if (count($selects) > 0) {
            foreach ($selects as $id => $select) {
                $select['attribute_id'] = $attribute->id;
                if (is_int($id)) {
                    $attributeSelectValue = AttributeSelectValue::findorfail($id);
                    $attributeSelectValue->update($select);
                } else {
                    AttributeSelectValue::create($select);
                }
            }
        }
    }
}
