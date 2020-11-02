<?php

namespace App\Http\Controllers;

use App\Article;
use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GuestController extends Controller
{
    public function index()
    {
        $articles = Article::with( 'category')
            ->orderBy("created_at", "desc")
            ->get();

        return view('home', compact(['articles']));
    }

    public function gallery()
    {

        $galleriePrivee = [];
        $galleriePublic = Gallery::where("private",false)->get();
        if ((!is_null(Auth::user()))and(Auth::user()->IsValidate())){
            $galleriePrivee = Gallery::where("private", true)->get();
        }

        return view("gallery", compact(['galleriePrivee','galleriePublic']));
    }

    public function activity(){
        return view("activity");
    }
    public function sentiers(){
//        return view("sentiers");
        return redirect(route("construction", ["page" => "sentiers"]));
    }
    public function chalets(){
//        return view("chalets");
        return redirect(route("construction", ["page" => "chalets"]));
    }
    public function compterendus(){
//        return view("compterendus");
        return redirect(route("construction", ["page" => "compterendus"]));
    }

    public function construction(Request $request){
        $page = $request->get("page", "");
        return view("construction", compact(["page"]));
    }
}
