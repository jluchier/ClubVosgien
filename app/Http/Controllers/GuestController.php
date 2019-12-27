<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function Index()
    {
        return view('home');
    }

    public function Page1()
    {
        return view("page1");
    }
}
