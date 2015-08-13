<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Admin\CustomerGroup;
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
        $customerGroups = \App\Admin\CustomerGroup::all();
        return view('admin.customer-group.index')
                    ->with('customerGroups',$customerGroups);
    }
 /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.customer-group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CustomerGroupRequest  $request
     * @return Response
     */
    public function store(CustomerGroupRequest $request)
    {
        $data  = $request->all();
        CustomerGroup::create($data);
        
        return redirect("admin/customer-group");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $customerGroup = CustomerGroup::findorfail($id);
        return view('admin.customer-group.edit')->with('customerGroup',$customerGroup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CustomerGroupRequest  $request
     * @param  int  $id
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
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
