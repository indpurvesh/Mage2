<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Product;
use App\Admin\Entity;
use App\Admin\Attribute;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $entity = Entity::Product()->get()->first();
        return view('admin.product.create')->with('entity' , $entity);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $entity = Entity::Product()->get()->first();
        $product = Product::create($request->all());

        $attributes = $request->get('attribute');
        foreach($attributes as $id => $attributeValue) {
            $attribute = Attribute::findorfail($id);

            $model = $this->getAttributeValueModel($attribute);

            $attributeValue['entity_id'] = $entity->id;
            $attributeValue['attribute_id'] = $id;

            var_dump($attributeValue);die;
            $model->create($attributeValue);
        }
        return $product;
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
