<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Mage2\Core\Model\Entity;
use App\Http\Requests\Admin\EntityRequest;
use App\Http\Controllers\Controller;

class EntityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $entities = Entity::all();
        return view('admin.entity.index')->with('entities', $entities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.entity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(EntityRequest $request)
    {
        $data  = $request->all();
        Entity::create($data);
        
        return redirect("admin/entity");
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
        $entity = Entity::findorfail($id);
        return view('admin.entity.edit')->with('entity',$entity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(EntityRequest $request, $id)
    {
        
        $entity = Entity::findorfail($id);
        $entity->update($request->all());
        
        return redirect("/admin/entity");
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
