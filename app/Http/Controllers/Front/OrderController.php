<?php

namespace App\Http\Controllers\Front;

use Mage2\Core\Model\Customer;
use Mage2\Core\Model\Address;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Mage2\Core\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        //@todo remove comments & delete below line


        if ($request->get('customer_id')) {
            $customer = Customer::findorfail($request->get('customer_id'));
        } else {
            if (Customer::ofEmail($request->get('email'))->count() <= 0) {
                if ($request->get('password') != "") {
                    $request->merge(['password' => str_random(6)]);
                }
                $customer = Customer::create($request->all());
            } else {
                $customer = Customer::ofEmail($request->get('email'))->get()->first();
            }
        }


        /* SHIPPING SAVE STEP */
        if ($request->get('step') == 'billing') {
            //SAVE or CREATE Billing ADDRESS 

            $request->merge(['type' => 'billing']);
            $request->merge(['customer_id' => $customer->id]);
            $address = Address::create($request->all());

            $orderData = ['customer_id' => $customer->id, 'billing_address_id' => $address->id];
            $order = Order::create($orderData);

            //DATA EXIST IF USER LOGGED IN....
            $data = $customer->toArray();
            $address = Address::Shipping()->ofCustomerId($customer->id)->get()->first();
            $data += (isset($address)) ? $address->toArray() : array();

            $data['address_id'] = (isset($address->id)) ? $address->id : "";
            $data['customer_id'] = $customer->id;
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

            $cart = (Session::get('cart')) ? Session::get('cart') : array();

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
    }

}
