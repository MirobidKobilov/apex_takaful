<?php

use App\Http\Controllers\Backend\ApplicationController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PasswordController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\ArticleController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\FeatureController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\StaffController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\MenuCotroller;
use App\Http\Controllers\Backend\BranchController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;


//Syspanel
Route::get('/', [DashboardController::class, 'index'])->name('backend.dashboard');

//Password
Route::get('pasword', [PasswordController::class, 'index'])->name('backend.password.index');
Route::post('password', [PasswordController::class, 'form'])->name('backend.password.form');

//Menu
Route::get('menu', [MenuCotroller::class, 'index'])->name('backend.menu.show');
Route::get('menu/data', [MenuCotroller::class, 'data'])->name('backend.menu.data');
Route::post('menu/form', [MenuCotroller::class, 'form'])->name('backend.menu.form');
Route::post('menu/delete', [MenuCotroller::class, 'delete'])->name('backend.menu.delete');

//Slider
Route::get('sliders', [SliderController::class, 'index'])->name('backend.sliders.show');
Route::get('sliders/data', [SliderController::class, 'data'])->name('backend.sliders.data');
Route::post('sliders/form', [SliderController::class, 'form'])->name('backend.sliders.form');
Route::post('sliders/delete', [SliderController::class, 'delete'])->name('backend.sliders.delete');

//Partner
Route::get('partners', [PartnerController::class, 'index'])->name('backend.partners.show');
Route::get('partners/data', [PartnerController::class, 'data'])->name('backend.partners.data');
Route::post('partners/form', [PartnerController::class, 'form'])->name('backend.partners.form');
Route::post('partners/delete', [PartnerController::class, 'delete'])->name('backend.partners.delete');

//Feature
Route::get('features', [FeatureController::class, 'index'])->name('backend.features.show');
Route::get('features/data', [FeatureController::class, 'data'])->name('backend.features.data');
Route::post('features/delete', [FeatureController::class, 'delete'])->name('backend.features.delete');
Route::get('features/form/{id?}', [FeatureController::class, 'getform'])->name('backend.features.getform');
Route::post('features/form/{id?}', [FeatureController::class, 'postform'])->name('backend.features.postform');

//Gallery
Route::get('gallery', [GalleryController::class, 'index'])->name('backend.galleries.show');
Route::get('gallery/data', [GalleryController::class, 'data'])->name('backend.galleries.data');
Route::post('gallery/form', [GalleryController::class, 'form'])->name('backend.galleries.form');
Route::post('gallery/delete', [GalleryController::class, 'delete'])->name('backend.galleries.delete');

//Product
Route::get('products', [ProductController::class, 'index'])->name('backend.products.show');
Route::get('products/data', [ProductController::class, 'data'])->name('backend.products.data');
Route::post('products/delete', [ProductController::class, 'delete'])->name('backend.products.delete');
Route::get('products/form/{id?}', [ProductController::class, 'getform'])->name('backend.products.getform');
Route::post('products/form/{id?}', [ProductController::class, 'postform'])->name('backend.products.postform');


//Comment
Route::get('comments', [CommentController::class, 'index'])->name('backend.comments.show');
Route::get('comments/data', [CommentController::class, 'data'])->name('backend.comments.data');
Route::post('comments/form', [CommentController::class, 'form'])->name('backend.comments.form');
Route::post('comments/delete', [CommentController::class, 'delete'])->name('backend.comments.delete');

//Staff
Route::get('staffs', [StaffController::class, 'index'])->name('backend.staffs.show');
Route::get('staffs/data', [StaffController::class, 'data'])->name('backend.staffs.data');
Route::post('staffs/form', [StaffController::class, 'form'])->name('backend.staffs.form');
Route::post('staffs/delete', [StaffController::class, 'delete'])->name('backend.staffs.delete');

//Branch
Route::get('branches', [BranchController::class, 'index'])->name('backend.branches.show');
Route::get('branches/data', [BranchController::class, 'data'])->name('backend.branches.data');
Route::post('branches/form', [BranchController::class, 'form'])->name('backend.branches.form');
Route::post('branches/delete', [BranchController::class, 'delete'])->name('backend.branches.delete');

//Article
Route::get('articles', [ArticleController::class, 'index'])->name('backend.articles.show');
Route::get('articles/data', [ArticleController::class, 'data'])->name('backend.articles.data');
Route::post('articles/delete', [ArticleController::class, 'delete'])->name('backend.articles.delete');
Route::get('articles/form/{id?}', [ArticleController::class, 'getform'])->name('backend.articles.getform');
Route::post('articles/form/{id?}', [ArticleController::class, 'postform'])->name('backend.articles.postform');

//Page
Route::get('page', [PageController::class, 'index'])->name('backend.page.show');
Route::get('page/data', [PageController::class, 'data'])->name('backend.page.data');
Route::post('page/delete', [PageController::class, 'delete'])->name('backend.page.delete');
Route::get('page/form/{id?}', [PageController::class, 'getform'])->name('backend.page.getform');
Route::post('page/form/{id?}', [PageController::class, 'postform'])->name('backend.page.postform');

// Application
Route::get('applications', [ApplicationController::class, 'index'])->name('backend.applications.show');
Route::get('applications/data', [ApplicationController::class, 'data'])->name('backend.applications.data');
Route::post('applications/delete', [ApplicationController::class, 'delete'])->name('backend.applications.delete');
Route::post('applications/read', [ApplicationController::class, 'read'])->name('backend.applications.read');


//logout
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Filemanager
Route::get('/filemanager', [PageController::class, 'filemanager'])->name('backend.filemanager');