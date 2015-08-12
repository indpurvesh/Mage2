<?php

namespace App\Http\Controllers\Front;

use App\Admin\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /*
     *
     * Displaying all the product withing the Category
     *
     */

    public function view($slug)
    {

        $product = Product::where('slug', '=', $slug)->get()->first();

        //Get Product Price @todo
        $price = $product->price()->get()->first();

        return view('front.product.view')->with('product', $product)
            ->with('price', $price);
    }
}
