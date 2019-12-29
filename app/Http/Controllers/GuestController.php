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

    public function galery()
    {
        return view("galery");
    }

    public function activity(){
        return view("activity");
    }
    public function sentiers(){
        return view("sentiers");
    }
    public function chalets(){
        return view("chalets");
    }
    public function compteRendus(){
        return view("compteRendus");
    }
}
