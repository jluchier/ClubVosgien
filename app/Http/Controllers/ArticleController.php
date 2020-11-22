<?php

namespace App\Http\Controllers;

;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\ImageManager;

class ArticleController extends Controller
{
    use ImageManager;

    public function index()
    {
        $articles = Article::with('category')
            ->orderBy("category_id")
            ->get();
        $categories = Category::pluck("name", "id");

        return view('Admin.Articles.index', compact(["articles", "categories"]));
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
        Article::insert([
            "title" => $request->get("title"),
            "content" => $request->get("content"),
            "category_id" => $request->get("category_id"),
            "image" => $this->storeImage("images",$request->get("image")),
        ]);

        return redirect(route("articles.index"))->with("success", "Article ajouté avec succès");
    }

    public function edit(Article $article)
    {
        $url = route("articles.update", $article->id);
        $method = "put";
        $categories = Category::pluck("name", "id");

        return view("Admin.Articles.edit", compact(["article", "url", "method", "categories"]));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->title = $request->get("title");
        $article->content = $request->get("content");
        $article->category_id = $request->get("category_id");

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


}
