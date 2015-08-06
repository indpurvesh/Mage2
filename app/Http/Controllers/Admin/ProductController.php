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
        
        $product = Product::create($request->all());

        $attributes = $request->get('attribute');
        foreach($attributes as $id => $attributeValue) {
            $attribute = Attribute::findorfail($id);

            $model = $this->getAttributeValueModel($attribute);

            $attributeValue['entity_id'] = $product->id;
            $attributeValue['attribute_id'] = $id;

            $model->create($attributeValue);
        }
       
        return redirect("/admin/product");
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
         $entity = Entity::Product()->get()->first();
         $product = Product::findorfail($id);
        return view('admin.product.edit')->with('entity' , $entity)
                                            ->with('product', $product);
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
        $product = Product::find($id);
        $product->update($request->all());
        
        $attributes = $request->get('attribute');
        foreach($attributes as $id => $attributeValue) {
            $attribute = Attribute::findorfail($id);

            $model = $this->getAttributeValueModel($attribute);
            //$tmpModel = clone($model);
                    $attributeValue['entity_id'] = $product->id;
            $attributeValue['attribute_id'] = $id;

            if($model->where('entity_id', '=' , $product->id)->where('attribute_id','=',$id)->get()->count() > 0) {
                //return $tmpModel;
                $model->update($attributeValue);
            } else {
                $model->create($attributeValue);
            }
        }
       
        return redirect("/admin/product");
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
