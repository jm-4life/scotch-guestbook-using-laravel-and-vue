<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignaturesController extends Controller
{
    /**
     * DIsplay the GuestBook homepage.
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('signatures.index');
    }

    /**
     * Display the guestbook form page
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('signatures.sign');
    }
}
