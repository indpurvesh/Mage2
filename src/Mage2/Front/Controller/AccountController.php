<?php
/*
Copyright (c) 2015, Purvesh
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:

* Redistributions of source code must retain the above copyright notice, this
  list of conditions and the following disclaimer.

* Redistributions in binary form must reproduce the above copyright notice,
  this list of conditions and the following disclaimer in the documentation
and/or other materials provided with the distribution.

* Neither the name of Mage2 nor the names of its
  contributors may be used to endorse or promote products derived from
  this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
    OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/

namespace Mage2\Front\Controller;

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

        return view('mage2::front.account.dashboard');

    }

    public function billing()
    {

        $customerId = app('front.auth')->user()->id;
        $billings = Address::Billing()->where('customer_id', '=', $customerId)->get();

        return view('mage2::front.account.billing')->with('billings', $billings);
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
        return view('mage2::front.account.edit-billing')->with('billing', $billing);
    }

    /**
     * Add Billing Address Form
     * @return \Illuminate\View\View
     *
     */
    public function addBilling()
    {
        return view('mage2::front.account.add-billing');
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

        return view('mage2::front.account.shipping')->with('shippings', $shippings);
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
        return view('mage2::front.account.edit-shipping')->with('shipping', $shipping);
    }

    /**
     * Add Billing Address Form
     * @return \Illuminate\View\View
     *
     */
    public function addShipping()
    {
        return view('mage2::front.account.add-shipping');
    }

    public function updateShipping($id, Request $request)
    {

        $address = Address::findorfail($id);
        $address->update($request->all());
        return redirect('/customer/account/shipping');
    }
}
