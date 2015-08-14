<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
   /**
     * Display a listing of the resource. @todo fix up the code better ways...
     *
     * @return Response
     */
    public function index()
    {
        $data = array();
        $config = Config::get('mage2');
        $user = (app('front.auth')->user()) ? app('front.auth')->toArray() : null;

        if(null !== $user) {
            $data['user'] = $user;
            
            $billingAddress = Address::Billing()->OfCustomerId($user['id'])->get()->toArray();
            $data['billing'] = (count($billingAddress) > 0) ? $billingAddress[0] : array();
            
            $shippingAddress = Address::Shipping()->OfCustomerId($user['id'])->get();
            $data['shipping'] = (count($shippingAddress) > 0) ? $shippingAddress[0] : array();
        }
        $cartData = (Session::get('cart')) ?  Session::get('cart') : array();
         //$data['user'] = array('firstname' => 'test');
        return view('front.checkout.index')->with('cart', $cartData)->with('data', $data)->with('config',$config);
    }
}
