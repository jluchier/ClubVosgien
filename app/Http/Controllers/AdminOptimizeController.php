<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use Illuminate\Support\Facades\Artisan as FacadesArtisan;

class AdminOptimizeController extends Controller
{
    public function optimisation()
    {
        Artisan::call('migrate');
        Artisan::call('optimize');
        return redirect(route("articles.index"))->with("success",'optimisation faite');
    }
}
