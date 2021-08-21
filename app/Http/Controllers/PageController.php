<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Staff;
use App\Models\Comment;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Feedback;
use App\Models\Application;
use App\Models\Feature;
use App\Models\Gallery;
use App\Models\Partner;
use DB;
use App\Models\Branch;
class PageController extends Controller
{
    public function index()
    {   
        $sliders = Slider::all();
        $articles = Article::where('type', 'news')->latest()->take(3)->get();
        $product_fam = Product::where('type', 'family')->get();
        $product_gen = Product::where('type', 'general')->get()->skip(2);
        $product_gen_2 = Product::where('type', 'general')->take(2)->get();
        $products = Product::all();
        $features = Feature::all();
        $staffs = Staff::all();
        $comments = Comment::all();
        $partners = Partner::all();
        $search = request()->query('search');

        if ($search) {

            $article = Article::where('title_ru', 'LIKE', "%{$search}%")->get();
            $product = Product::where('title_ru', 'LIKE', "%{$search}%")->get();

            if($article || $product) {
                return view('frontend.pages.search', compact('article', 'product'));
            }

            return abort(404);
        }
        
        return view('frontend.pages.index', compact('sliders', 'features', 'products', 'articles', 'product_fam', 'product_gen', 'product_gen_2', 'staffs', 'partners', 'comments'));
    }

    public function show($id)
    {
        $page = Page::where('id', $id)->firstOrFail();

		$menus = Menu::where('page_id', $page->id)->firstOrFail();
        
        return view('frontend.pages.show', compact('page', 'menus'));
    }

    public function application()
	{
		$data = request()->validate([
			'name' => 'required|max:191',
			'phone' => 'required|max:191',
			'type' => 'required',
		]);

		$feedback = Application::create($data);
		return redirect()->back();
	}

    public function contact()
    {
        $branches = Branch::all();
        $coordinates = Branch::select('coordinate')->get();
        return view('frontend.pages.contact', compact('branches', 'coordinates'));
    }

    public function branch() {
        
    }

    public function form()
    {
        $data = request()->validate([
			'name' => 'required|max:191',
			'email' => 'required|max:191',
			'phone' => 'required',
			'message' => 'required',
		]);

		$feedback = Feedback::create($data);
		return redirect()->back();
    }

    public function gallery() {
        $images = Gallery::all();

        return view('frontend.gallery.index', ['images' => $images]);
    }
}
