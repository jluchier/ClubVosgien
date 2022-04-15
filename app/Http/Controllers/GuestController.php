<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Compterendu;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Traits\dateManager;

class GuestController extends Controller
{
  use dateManager;
  public function index()
  {
    $actualite = Article::whereCategory("Actualité")
    ->orderBy('dateEvent',"asc")
    ->limit('2')
    ->get();

    $agenda = Article::whereCategory("Agenda")
    ->orderBy('dateEvent',"asc")
    ->limit('5')
    ->get();

    foreach ($agenda as $value){
      $value->dateEvent = new Carbon($value->dateEvent);
      $value->dateEvent->locale();
      $value->dateEvent = $value->dateEvent->isoFormat("dddd Do MMMM YYYY");
      $value->dateEvent = ucfirst($value->dateEvent);
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
    $sentiers=Article::whereCategory("sentiers")
    ->get();
    return view("sentiers", compact(['sentiers']));
    // return redirect(route("construction", ["page" => "sentiers"]));
  }

  public function chalets(){
    //        return view("chalets");
    return redirect(route("construction", ["page" => "chalets"]));
  }

  public function compterendus(){
    $compterendus = Compterendu::all();
    return view("compterendus", compact(['compterendus']));
  }

  public function construction(Request $request){
    $page = $request->get("page", "");
    return view("construction", compact(["page"]));
  }

  public function infosFede(){
    $articlesComite = Article::select("articles.*")
    ->whereCategory("Comité")
    ->orderBy("id")
    ->get();

    foreach ($articlesComite as $value){
      $value->dateEvent = new Carbon($value->dateEvent);
      $value->dateEvent->locale();
      $value->dateEvent = $value->dateEvent->isoFormat("dddd Do MMMM YYYY");
    }

    $articlesFormations = Article::select("articles.*")
    ->whereCategory("Formations")
    ->orderBy("id")
    ->get();
    foreach ($articlesFormations as $value){
      $value->dateEvent = new Carbon($value->dateEvent);
      $value->dateEvent->locale();
      $value->dateEvent = $value->dateEvent->isoFormat("dddd Do MMMM YYYY");
    }
    $articlesAdhesions = Article::select("articles.*")
    ->whereCategory("Adhésions")
    ->orderBy("id")
    ->get();
    foreach ($articlesAdhesions as $value){
      $value->dateEvent = new Carbon($value->dateEvent);
      $value->dateEvent->locale();
      $value->dateEvent = $value->dateEvent->isoFormat("dddd Do MMMM YYYY");
    }
    $articlesPartenaires = Article::select("articles.*")
    ->whereCategory("Partenaires")
    ->orderBy("dateEvent",'asc')
    ->get();
    foreach ($articlesPartenaires as $value){
      $value->dateEvent = new Carbon($value->dateEvent);
      $value->dateEvent->locale();
      $value->dateEvent = $value->dateEvent->isoFormat("dddd Do MMMM YYYY");
    }

    $admin=false;

    return view('infosFede', compact(["articlesComite", "articlesFormations", "articlesAdhesions", "articlesPartenaires", "admin"]));
  }

  public function galleryDetail($id) {
    $gallery=Gallery::findorfail($id);
    $gallery->dateSortie = $this->dateFormat($gallery->dateSortie);

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

  public function agendaDetail($id) {
    $agenda = Article::whereCategory("Agenda")
    ->orderBy('dateEvent',"desc")
    ->limit('5')
    ->get();
    $agendaDetail = $agenda[$id];
    $agendaDetail->dateEvent = $this->dateFormat($agendaDetail->dateEvent);
    return view('agendaDetail', compact(['agendaDetail']));
  }

  public function contact(){

    return view('contact');
  }
}
