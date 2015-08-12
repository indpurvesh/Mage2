<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Admin\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /*
     *
     * Displaying all the product withing the Category
     *
     */

    public function view($slug)
    {

        $category = Category::where('slug', '=', $slug)->get()->first();

        return view('front.category.view')->with('category', $category);
    }
}
