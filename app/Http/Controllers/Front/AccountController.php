<?php

namespace App\Http\Controllers\Front;

use Mage2\Core\Model\Address;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{

    /*
     * Display Home Page
     *
     */

    public function dashboard()
    {

        return view('front.account.dashboard');

    }

    public function billing()
    {

        $customerId = app('front.auth')->user()->id;
        $billings = Address::Billing()->where('customer_id', '=', $customerId)->get();

        return view('front.account.billing')->with('billings', $billings);
    }

    public function storeBilling(Request $request)
    {
        $customerId = app('front.auth')->user()->id;
        $request->merge(['customer_id' => $customerId]);

        Address::create($request->all());
        return redirect('/customer/account/billing');

    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     *
     */
    public function editBilling()
    {
        $billing = Address::find($id = 1);
        return view('front.account.edit-billing')->with('billing', $billing);
    }

    /**
     * Add Billing Address Form
     * @return \Illuminate\View\View
     *
     */
    public function addBilling()
    {
        return view('front.account.add-billing');
    }

    public function updateBilling($id, Request $request)
    {

        $address = Address::findorfail($id);
        $address->update($request->all());
        return redirect('/customer/account/billing');
    }


    public function shipping()
    {

        $customerId = app('front.auth')->user()->id;
        $shippings = Address::Shipping()->where('customer_id', '=', $customerId)->get();

        return view('front.account.shipping')->with('shippings', $shippings);
    }

    public function storeShipping(Request $request)
    {
        $customerId = app('front.auth')->user()->id;
        $request->merge(['customer_id' => $customerId]);

        Address::create($request->all());
        return redirect('/customer/account/shipping');

    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     *
     */
    public function editShipping($id)
    {
        $shipping = Address::find($id);
        return view('front.account.edit-shipping')->with('shipping', $shipping);
    }

    /**
     * Add Billing Address Form
     * @return \Illuminate\View\View
     *
     */
    public function addShipping()
    {
        return view('front.account.add-shipping');
    }

    public function updateShipping($id, Request $request)
    {

        $address = Address::findorfail($id);
        $address->update($request->all());
        return redirect('/customer/account/shipping');
    }
}
