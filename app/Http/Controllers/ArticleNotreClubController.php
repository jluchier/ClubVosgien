<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\ImageManager;
use Carbon\Carbon;

class ArticleNotreClubController extends Controller
{
    public function __construct()
  {
    $this->middleware('auth');
  }
  public function __invoke()
  {
      // ...
  }
  public function index()
  {
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
          ->orderBy("id")
          ->get();
      foreach ($articlesPartenaires as $value){
            $value->dateEvent = new Carbon($value->dateEvent);
            $value->dateEvent->locale();
            $value->dateEvent = $value->dateEvent->isoFormat("dddd Do MMMM YYYY");
      }

      return view('Admin.Articles.editNotreClub', compact(["articlesComite", "articlesFormations", "articlesAdhesions", "articlesPartenaires"]));
  }

}
