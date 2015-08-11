<?php

namespace App\Http\Controllers\Front;

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
}
