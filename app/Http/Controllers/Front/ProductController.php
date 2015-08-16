<?php

namespace App\Http\Controllers\Front;

use Mage2\Core\Model\Product;
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
        $price = $product->getPrice();

        return view('front.product.view')->with('product', $product)
            ->with('price', $price);
    }
}
