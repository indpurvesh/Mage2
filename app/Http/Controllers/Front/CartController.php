<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Admin\Product;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cartData = ($request->session()->get('cart')) ?  $request->session()->get('cart') : array();
        return view('front.cart.index')->with('cart',$cartData);
    }


    /**
     * Add to cart the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function addtocart($id, Request $request)
    {
        $product = Product::findorfail($id);
        $session = $request->session();

        //Manually Empty Cart here
        //$session->forget('cart');

        $cartData = ($session->get('cart')) ? $session->get('cart') : array() ;

        if(array_key_exists($product->id, $cartData)) {
            $cartData[$product->id]['qty']++;
        } else {
            $cartData[$product->id] = array(
                'id'    => $product->id,
                'name' => $product->name,
                'image' => (isset($product->images()->first()->path)) ? $product->images()->first()->path : 'http://placehold.it/500x500',
                'price' => $product->getPrice(),
                'qty'   => 1
            );
        }

        $request->session()->put('cart', $cartData);
        return redirect()->back()->with('message','Prodcut Added Successfully!');
    }

    /**
     * Delete to cart the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function deletecartitem($id,Request $request) {

        $session = $request->session();

        $cartData = ($session->get('cart')) ? $session->get('cart') : array() ;
        unset($cartData[$id]);
        $request->session()->put('cart', $cartData);
        return redirect()->back();

    }
    
     /**
     * Upddate to cart the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function updatecartitem(Request $request)
    {
        
        $qtys = $request->get('qty');
        //$session = $request->session();
        
        $cartData = (Session::get('cart')) ? Session::get('cart') : array() ;
        
        foreach ($qtys as $id => $qty) {
            if(isset($cartData[$id])) {
                $cartData[$id]['qty'] = $qty;
            } else {
                // think again throw exception or just unset products?????
            }
        }
        
        Session::put('cart',$cartData);
        
        return redirect()->back();
        
    }
}
