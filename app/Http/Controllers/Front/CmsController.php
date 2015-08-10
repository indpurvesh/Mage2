<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CmsController extends Controller
{

    /*
     * Display Home Page
     *
     */

    public function home()
    {

        return view('front.cms.home');

    }
}
