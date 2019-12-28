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

    public function Page1()
    {
        return view("page1");
    }
}
