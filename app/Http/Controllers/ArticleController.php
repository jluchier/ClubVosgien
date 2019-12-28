<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        Article::insert([
            "title" => $request->get("title"),
            "content" => $request->get("content"),
            "category_id" => $request->get("category_id")
        ]);

        return redirect(route("articles.index"))->with("success", "Article ajouté avec success");
    }

    public function show(Article $article)
    {
        //
    }

    public function edit(Article $article)
    {
        $url = route("articles.update", $article->id);
        $method = "put";
        $categories = Category::pluck("name", "id");

        return view("Admin.Articles.edit", compact(["article", "url", "method", "categories"]));
    }

    public function update(Request $request, Article $article)
    {
        $article->title = $request->get("title");
        $article->content = $request->get("content");
        $article->category_id = $request->get("category_id");
        $article->save();

        return redirect(route("articles.index"))->with("success", "Article modifier avec success");
    }

    public function destroy(Article $article)
    {
        Article::destroy($article->id);

        return redirect(route("articles.index"))->with("success", "Article supprimé");
    }
}
