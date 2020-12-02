<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GuestController extends Controller
{
    public function index()
    {
        $actualite = Article::whereCategory("Actualité")
        ->orderBy('updated_at',"desc")
        ->limit('2')
        ->get();

        $agenda = Article::whereCategory("Agenda")
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

        foreach ($galleriePublic as $gallery)
        {
            $allImage = Storage::disk("public")->allFiles("gallery/{$gallery->title}/thumb");
            if (sizeof($allImage) > 0)
            {
                $gallery->firstImage = $allImage[0];
            }
            else
            {
                $gallery->firstImage = "";
            }
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
    public function galleryDetail($id) {
        $gallery=Gallery::findorfail($id);
        $allImage = Storage::disk("public")->files("gallery/{$gallery->title}/small");
        $allColumn = [[],[],[],[]];
        $CurrentColumn = 0;
        foreach ($allImage as $image){
            $tempImg = explode('/',$image);
            $lastIndex = array_key_last($tempImg);
            $allColumn[$CurrentColumn][] = $tempImg[$lastIndex];
            $CurrentColumn++;
            if ($CurrentColumn > 3) {
                $CurrentColumn = 0;
            }
        }
        return view('galleryDetail', compact(['allColumn', 'gallery']));
    }
}
