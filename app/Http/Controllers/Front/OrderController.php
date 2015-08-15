<?php

namespace App\Http\Controllers\Front;

use App\Front\Customer;
use App\Front\Address;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use App\Front\Order;
use App\Http\Requests\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) {

        //@todo remove comments & delete below line
        $customer = Customer::find(2);
        /*
          if(Customer::ofEmail($request->get('email'))->count() <= 0 ) {
          if($request->get('password') != "") {
          $request->merge(['password' => str_random(6)]);
          }
          $customer = Customer::create($request->all());
          } else {
          $customer = Customer::ofEmail($request->get('email'))->get()->first();
          }
         * 
         */



        /* SHIPPING SAVE STEP */
        if ($request->get('step') == 'billing') {
            //SAVE or CREATE Billing ADDRESS 

            $request->merge(['type' => 'billing']);
            $request->merge(['customer_id' => $customer->id]);
            $address = Address::create($request->all());

            $orderData = ['customer_id' => $customer->id, 'billing_address_id' => $address->id];
            $order = Order::create($orderData);
            //DATA EXIST IF USER LOGGED IN....
            $data = [];
            //@TODO Create ORDER HERE
            return view('front.order.shipping-step')->with('data', $data)->with('order', $order);
        }

        /* SHIPPING SAVE STEP */
        if ($request->get('step') == 'shipping') {
            //SAVE or CREATE Billing ADDRESS 
            $order = Order::findorfail($request->get('order_id'));

            $request->merge(['type' => 'SHIPPING']);
            $request->merge(['customer_id' => $customer->id]);
            $address = Address::create($request->all());

            $orderData = ['shipping_address_id' => $address->id];
            $order->update($orderData);
            //DATA EXIST IF USER LOGGED IN....
            $data = [];
            $config = Config::get('mage2');
            return view('front.order.shipping-method')
                    ->with('data', $data)
                    ->with('order', $order)
                    ->with('config', $config);
        }
        
        /* SHIPPING  METHOD SAVE STEP */
        if ($request->get('step') == 'shipping-method') {
            
            $order = Order::find($request->get('order_id'));
            $order->update($request->all());
            
            //DATA EXIST IF USER LOGGED IN....
            $data = [];
            $config = Config::get('mage2');
            return view('front.order.payment-method')
                    ->with('data', $data)
                    ->with('order', $order)
                    ->with('config', $config);
        }
        
        /* PAYMENT METHOD SAVE STEP */
        if ($request->get('step') == 'payment-method') {
        
            $cart = (Session::get('cart')) ?  Session::get('cart') : array();
            
            $order = Order::find($request->get('order_id'));
            $order->update($request->all());
            
            //DATA EXIST IF USER LOGGED IN....
            $data = [];
            
            return view('front.order.order-review')
                    ->with('data', $data)
                    ->with('cart', $cart)
                    ->with('order', $order);
            
        }
        
           /* SHIPPING  METHOD SAVE STEP */
        if ($request->get('step') == 'order-review') {
            
            $order = Order::find($request->get('order_id'));
            $order->update($request->all());
            
            Session::forget('cart');
            
            return view('front.order.success')->with('order', $order);
        }

        /**
         * @TODO remove Bottom
         
        return $request->all();
        //@TODO bug allowing only login user to create order
        $userId = Auth::user()->id;
        //If user is not authenticated then create user
        $billingData = $request->get('billing');
        //1 for Billing Type Address
        $billingData['type'] = "1";
        $billingData['customer_id'] = $userId;

        $address = Address::create($billingData);

        if ($request->get('sameasbilling') == 1) {
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

        return view('front.order.success')->with('order', $order);
         * 
         */
    }

}
