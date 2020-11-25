<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GuestController extends Controller
{
    public function index()
    {
        $actualite = Article::where("category_id", 1)
        ->orderBy('updated_at',"desc")
        ->limit('1')
        ->get();

        $agenda = Article::where("category_id", 5)
        ->orderBy('updated_at',"desc")
        ->limit('5')
        ->get();

        return view('home', compact(['actualite', 'agenda']));
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
    public function infosFede(){
        $articles = Article::with( 'category')
        ->orderBy("created_at", "desc")
        ->get();
        return view("infosFede", compact(['articles']));
        // return redirect(route("construction", ["page" => "infosFede"]));
    }
}
