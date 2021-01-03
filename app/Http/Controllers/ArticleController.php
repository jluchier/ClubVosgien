<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\ImageManager;
use Carbon\Carbon;

class ArticleController extends Controller
{
    use ImageManager;

    public function __invoke()
    {
        // ...
    }

    public function index(Request $request)
    {
      $articleRequest = Article::with('category')->orderBy("category_id")->limit(10);

      $currentCategory = $request->get("category", -1);
      if ( $currentCategory == -1)
      {
          $articles = $articleRequest->get();
      }
      else
      {
          $articles = $articleRequest->where("category_id", $currentCategory)->get();
      }

        $categories = [-1 => "Tous"] + Category::pluck("name", "id")->toArray();

        foreach ($articles as $value){
              $value->dateEvent = new Carbon($value->dateEvent);
              $value->dateEvent->locale();
              $value->dateEvent = $value->dateEvent->isoFormat("dddd Do MMMM YYYY");
        }

        return view('Admin.Articles.index', compact(["articles", "categories", "currentCategory"]));
    }

    public function create()
    {
        $article = new Article();
        $url = route("articles.store");
        $method = "post";
        $categories = Category::pluck("name", "id");

        return view('Admin.Articles.edit', compact(["article", "url", "method", "categories"]));
    }

    public function store(ArticleRequest $request)
    {
        Article::create([
            "title" => $request->get("title"),
            "content" => $request->get("content", ""),
            "category_id" => $request->get("category_id"),
            "image" => $this->storeImage("images",$request->get("image")),
            "dateEvent" => $request->get("dateEvent")
        ]);

        return redirect(route("articles.index"))->with("success", "Article ajouté avec succès");
    }

    public function edit(Article $article)
    {
        $url = route("articles.update", $article->id);
        $method = "put";
        $categories = Category::pluck("name", "id");

        $article->content = preg_replace('/\s\s+/', '', $article->content);

        return view("Admin.Articles.edit", compact(["article", "url", "method", "categories"]));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->title = $request->get("title");
        $article->content = $request->get("content", "");
        $article->category_id = $request->get("category_id");
        $article->dateEvent = $request->get("dateEvent");

        if ($request->has("imageDelete")){
           $this->deleteImage("images",$article->image);
           $article->image = null;
        }
        else if ($request->get("image", null) != null)
        {
            $this->deleteImage("images",$article->image);
            $pathImage=$this->storeImage("images",$request->get("image"));

            $article->image = $pathImage;
        }

        $article->save();
        return redirect(route("articles.index"))->with("success", "Article modifié avec succès");
    }

    public function destroy(Article $article)
    {
        $this->deleteImage("images",$article->image);
        Article::destroy($article->id);

        return redirect(route("articles.index"))->with("success", "Article supprimé");
    }

    public function lastOne()
    {
        $articles = Article::orderBy("date","asc")->with('category')
            ->first();
        $categories = Category::pluck("name", "id");

        return view('home', compact(["articles", "categories"]));
    }
}
