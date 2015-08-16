<?php

namespace App\Http\Controllers\Front;

use App\Front\Address;
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
        //$config = Config::get('mage2');
        $customer = (app('front.auth')->user()) ? app('front.auth')->user() : null;

        if (null !== $customer) {

            $data = $customer->toArray();
            $billingAddress = Address::Billing()->OfCustomerId($customer->id)->get()->first();

            if (isset($billingAddress)) {
                $data += $billingAddress->toArray();
                $data['address_id'] = $billingAddress->id;
                $data['customer_id'] = $customer->id;
            }

        }

        return view('front.checkout.index')->with('data', $data);
    }
}
