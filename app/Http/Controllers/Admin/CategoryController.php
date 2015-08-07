<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryRequest;
use App\Admin\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::lists('name', 'id');
        return view('admin.category.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {

        $category = Category::create($request->all());

        if($request->file('file') != "") {
            $category->image_path = $this->uploadImage($request->file('file'), $for = 'categories');
        }
        $category->slug = str_slug($request->get('name'));
        //update File Path and Slug
        $category->save();

        return redirect('/admin/category');
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
        $category = Category::findorfail($id);
        $categories = Category::lists('name', 'id');
        return view('admin.category.edit')
            ->with('categories', $categories)
            ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
         $category = Category::findorfail($id);
         $category->update($request->all());

        if($request->file('file') != "") {
            $category->image_path = $this->uploadImage($request->file('file'), $for = 'categories');
        }
        $category->slug = str_slug($request->get('name'));
        //update File Path and Slug
        $category->save();

        return redirect('/admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('/admin/category');
    }
}
