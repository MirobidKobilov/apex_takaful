<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Article;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        $news = Article::where('type', 'news')->get();
        $articles = Article::where('type', 'article')->get();
        $products = Product::all();

        return view('backend.dashboard.index', ['pages' => $pages, 'news' => $news, 'articles' => $articles, 'products' => $products]);
    }
}
