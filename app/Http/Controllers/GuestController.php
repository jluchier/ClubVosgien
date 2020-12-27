<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class GuestController extends Controller
{
    public function index()
    {
        $actualite = Article::whereCategory("Actualité")
        ->orderBy('updated_at',"desc")
        ->limit('2')
        ->get();

        $agenda = Article::whereCategory("Agenda")
        ->orderBy('dateEvent',"desc")
        ->limit('5')
        ->get();

        foreach ($agenda as $value){
              $value->dateEvent = new Carbon($value->dateEvent);
              $value->dateEvent->locale();
              $value->dateEvent = $value->dateEvent->isoFormat("dddd Do MMMM YYYY");
        }

        return view('home', compact(['actualite', 'agenda']));
    }

    public function gallery()
    {
      $galleries = [];
      if ((!is_null(Auth::user()))and(Auth::user()->IsValidate())){
          $galleries = Gallery::orderBy("dateSortie", "desc")
            ->orderBy("private", "desc")
            ->get();
      }
      else {
        $galleries = Gallery::where("private",false)->orderBy("dateSortie", "desc")->get();
      }

      $galleryColumn = [[], [], [], []];
      $currentColumn = 0;
      foreach ($galleries as $gallery){

            $allImage = Storage::disk("public")->allFiles("gallery/{$gallery->title}/thumb");
            if (sizeof($allImage) > 0)
            {
                $gallery->firstImage = $allImage[0];
            }
            else
            {
                $gallery->firstImage = "";
            }
            $gallery->dateSortie = new Carbon($gallery->dateSortie);
            $gallery->dateSortie->locale();
            $gallery->dateSortie = $gallery->dateSortie->isoFormat("dddd Do MMMM YYYY");


          $galleryColumn[$currentColumn][] = $gallery;
          $currentColumn++;
          if ($currentColumn > 3) {
              $currentColumn = 0;
          }
      }

      return view("gallery", compact(['galleryColumn']));
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
        $comite = Article::whereCategory("Comité")
        ->orderBy('category_id')
        ->get();
        $formations = Article::whereCategory("Formations")
        ->orderBy('category_id')
        ->get();
        $adhesions = Article::whereCategory("Adhésions")
        ->orderBy('category_id')
        ->get();
        $partenaires = Article::whereCategory("Partenaires")
        ->orderBy('category_id')
        ->get();
        return view("infosFede", compact(['articles', 'comite', 'formations', 'adhesions', 'partenaires']));
        // return redirect(route("construction", ["page" => "infosFede"]));
    }

    public function galleryDetail($id) {
        $gallery=Gallery::findorfail($id);

        $gallery->dateSortie = new Carbon($gallery->dateSortie);
        $gallery->dateSortie->locale();
        $gallery->dateSortie = $gallery->dateSortie->isoFormat("dddd Do MMMM YYYY");

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
