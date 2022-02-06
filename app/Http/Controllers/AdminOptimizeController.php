<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class AdminOptimizeController extends Controller
{
    public function optimisation(){

            Artisan::call('optimize');
            return redirect(route("articles.index"))->with("success",'optimisation faite');
    }
}
