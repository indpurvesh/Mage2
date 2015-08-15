<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /* SHIPPING SAVE STEP */
        if($request->get('step') == 'billing') {
            //SAVE or CREATE Billing ADDRESS 
            $data = [];
            return view('front.order.shipping-step')->with('data', $data);
        }
        
        /* SHIPPING SAVE STEP */
         if($request->get('step') == 'shipping') {
            //SAVE or CREATE Billing ADDRESS 
            $data = [];
            return view('front.order.shipping-method')->with('data', $data);
        }
        
        return $request->all();
        //@TODO bug allowing only login user to create order
        $userId = Auth::user()->id;
        //If user is not authenticated then create user
        $billingData = $request->get('billing');
        //1 for Billing Type Address
        $billingData['type'] = "1";
        $billingData['customer_id'] = $userId;
       
        $address = Address::create($billingData);

        if($request->get('sameasbilling') == 1) {
            $shippingAddressData = $billingData;
            //Orverride type for addresss
            $shippingAddressData['type'] = 2;

            Address::create($shippingAddressData);
        }
        
        //Create order table records;;;
        $orderData['customer_id'] = $userId;
        $orderData['billing_address_id'] = $address->id;
        //tmp keep it same
        $orderData['shipping_address_id'] = $address->id;
        $orderData['shipping_type'] = $request->get('shipping_type');
        $orderData['payment_type'] = $request->get('payment_type');

        $order = Order::create($orderData);

        //Save Order Items here...


        //Empty Session Here..
        Session::forget('cart');

        return view('front.order.success')->with('order',$order);
    }

}
