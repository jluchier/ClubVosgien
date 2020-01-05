<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')
            ->orderBy("category_id")
            ->get();

        return view('Admin.Articles.index', compact(["articles", "categories"]));
    }

    public function create()
    {
        $article = new Article();
        $url = route("articles.store");
        $method = "post";
        $categories = Category::pluck("name", "id");

        return view("Admin.Articles.edit", compact(["article", "url", "method", "categories"]));
    }

    public function store(ArticleRequest $request)
    {
        Article::insert([
            "title" => $request->get("title"),
            "content" => $request->get("content"),
            "category_id" => $request->get("category_id"),
            "image" => $this->storeImage($request),
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

        $pathImage=$this->storeImage($request);
        if ($pathImage != null)
        {
            if ($article->image != null){
                Storage::disk('public')->delete("images/small/".$article->image);
                Storage::disk('public')->delete("images/medium/".$article->image);
                Storage::disk('public')->delete("images/large/".$article->image);
                Storage::disk('public')->delete("images/thumb/".$article->image);
            }
            $article->image = $pathImage;
        }

        $article->save();

        return redirect(route("articles.index"))->with("success", "Article modifié avec succès");
    }

    public function destroy(Article $article)
    {
        Article::destroy($article->id);

        return redirect(route("articles.index"))->with("success", "Article supprimé");
    }

    private function storeImage(Request $request)
    {
        if ($request->hasFile("image"))
        {
            if ($request->file('image')->isValid())
            {
                $out = explode(".", $request->file("image")->hashName(), 2)[0].".jpg";
                $this->resizeImage($request, 800, "images/small/".$out);
                $this->resizeImage($request, 1280, "images/medium/".$out);
                $this->resizeImage($request, 1920, "images/large/".$out);
                $this->resizeImage($request, 128, "images/thumb/".$out, true);
                return $out;
            }
        }

        return null;
    }

    private function resizeImage(Request $request, $size, $out, $fit = false){
        $img = Image::make($request->file('image')->path())->orientate();

        if ($fit)
        {
            $img->fit($size);
        }
        else {
            $img->widen($size);
        }

        $img->interlace(true)->encode("jpg", 70);
        Storage::disk("public")->put($out, $img);
    }
}
