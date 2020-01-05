<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function Index()
    {
        $articles = Article::with('category')
            ->orderBy("created_at", "desc")
            ->get();

        return view('home', compact(['articles']));
    }

    public function gallery()
    {
        return view("galery");
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
    public function compteRendus(){
//        return view("compteRendus");
        return redirect(route("construction", ["page" => "compteRendus"]));
    }

    public function construction(Request $request){
        $page = $request->get("page", "");
        return view("construction", compact(["page"]));
    }
}
