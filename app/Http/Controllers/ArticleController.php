<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Menu;
use GrahamCampbell\ResultType\Result;

class ArticleController extends Controller
{
    public function news() {
        $articles = Article::where('type', 'news')->get();

        return view('frontend.articles.index', compact('articles'));
    }

    public function articles() {
        $articles = Article::where('type', 'article')->get();

        return view('frontend.articles.index', compact('articles'));
    }

    public function show($id)
    {
        // $menu = Menu::where('page_id', $id);
        
        $article = Article::where('id', $id)->firstOrFail();
        
        return view('frontend.articles.show', ['article' => $article]);
    }
}
