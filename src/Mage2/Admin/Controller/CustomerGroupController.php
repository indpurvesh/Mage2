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
namespace Mage2\Admin\Controller;

use Illuminate\Http\Request;
use Mage2\Core\Model\CustomerGroup;
use App\Http\Requests\Admin\CustomerGroupRequest;
use App\Http\Controllers\Controller;

class CustomerGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $customerGroups = CustomerGroup::all();
        return view('mage2::admin.customer-group.index')
            ->with('customerGroups', $customerGroups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('mage2::admin.customer-group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CustomerGroupRequest $request
     * @return Response
     */
    public function store(CustomerGroupRequest $request)
    {
        $data = $request->all();
        CustomerGroup::create($data);

        return redirect("mage2::admin/customer-group");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $customerGroup = CustomerGroup::findorfail($id);
        return view('mage2::admin.customer-group.edit')->with('customerGroup', $customerGroup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CustomerGroupRequest $request
     * @param  int $id
     * @return Response
     */
    public function update(CustomerGroupRequest $request, $id)
    {

        $customerGroup = CustomerGroup::findorfail($id);
        $customerGroup->update($request->all());

        return redirect("/admin/customer-group");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
