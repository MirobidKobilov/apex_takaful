<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;

Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => [ 'localizationRedirect', 'localeViewPath' ]
	],
	function()
	{
		//Home
		Route::get('/', [PageController::class, 'index'])->name('home');
		Route::post('/', [PageController::class, 'application'])->name('application');

		//Pages
        Route::get('/pages', [PageController::class, 'index']);
		Route::get('/pages/{id}', [PageController::class, 'show'])->name('pages.show');

		//Contact
		Route::get('/contact', [PageController::class, 'contact'])->name('contact');
		Route::post('/contact', [PageController::class, 'form'])->name('contact.form');

		//Article
		Route::get('/news', [ArticleController::class, 'news'])->name('news');
		Route::get('/news/{id}', [ArticleController::class, 'show'])->name('articles.show');
		Route::get('/articles', [ArticleController::class, 'articles'])->name('articles');
		Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

		//Product
		Route::get('/family-products', [ProductController::class, 'family'])->name('family-products');
		Route::get('/general-products', [ProductController::class, 'general'])->name('general-products');
		Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

		//Gallery
		Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');

		//Application
		Route::post('/application',[PageController::class, 'application'])->name('application');
        
	});
	
	//Login
	Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
	Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('post-login');
