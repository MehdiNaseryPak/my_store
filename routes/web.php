<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\Content\FaqController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\Admin\Content\PageController;
use App\Http\Controllers\Admin\Content\PostController;
use App\Http\Controllers\Admin\Market\BrandController;
use App\Http\Controllers\Admin\Content\BannerController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Admin\ProjectGalleryController;
use App\Http\Controllers\Admin\Content\PostCategoryController;
use App\Http\Controllers\Admin\Market\ProductCategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::prefix('content')->group(function () {
        // PostCategory
        Route::prefix('post_categories')->group(function(){
            Route::get('/',[PostCategoryController::class,'index'])->name('admin.content.post_category.index');
            Route::get('/create',[PostCategoryController::class,'create'])->name('admin.content.post_category.create');
            Route::post('/store',[PostCategoryController::class,'store'])->name('admin.content.post_category.store');
            Route::get('/edit/{postCategory}',[PostCategoryController::class,'edit'])->name('admin.content.post_category.edit');
            Route::put('/update/{postCategory}',[PostCategoryController::class,'update'])->name('admin.content.post_category.update');
        });
        // Post
        Route::prefix('posts')->group(function(){
            Route::get('/',[PostController::class,'index'])->name('admin.content.post.index');
            Route::get('/create',[PostController::class,'create'])->name('admin.content.post.create');
            Route::post('/store',[PostController::class,'store'])->name('admin.content.post.store');
            Route::get('/edit/{post}',[PostController::class,'edit'])->name('admin.content.post.edit');
            Route::put('/update/{post}',[PostController::class,'update'])->name('admin.content.post.update');
        });
        // Faq
        Route::prefix('faqs')->group(function(){
            Route::get('/',[FaqController::class,'index'])->name('admin.content.faq.index');
            Route::get('/create',[FaqController::class,'create'])->name('admin.content.faq.create');
            Route::post('/store',[FaqController::class,'store'])->name('admin.content.faq.store');
            Route::get('/edit/{faq}',[FaqController::class,'edit'])->name('admin.content.faq.edit');
            Route::put('/update/{faq}',[FaqController::class,'update'])->name('admin.content.faq.update');
        });
        // Menu
        Route::prefix('menus')->group(function(){
            Route::get('/',[MenuController::class,'index'])->name('admin.content.menu.index');
            Route::get('/create',[MenuController::class,'create'])->name('admin.content.menu.create');
            Route::post('/store',[MenuController::class,'store'])->name('admin.content.menu.store');
            Route::get('/edit/{menu}',[MenuController::class,'edit'])->name('admin.content.menu.edit');
            Route::put('/update/{menu}',[MenuController::class,'update'])->name('admin.content.menu.update');
        });
        // Banner
        Route::prefix('banners')->group(function(){
            Route::get('/',[BannerController::class,'index'])->name('admin.content.banner.index');
            Route::get('/create',[BannerController::class,'create'])->name('admin.content.banner.create');
            Route::post('/store',[BannerController::class,'store'])->name('admin.content.banner.store');
            Route::get('/edit/{banner}',[BannerController::class,'edit'])->name('admin.content.banner.edit');
            Route::put('/update/{banner}',[BannerController::class,'update'])->name('admin.content.banner.update');
        });
        // Page
        Route::prefix('pages')->group(function(){
            Route::get('/',[PageController::class,'index'])->name('admin.content.page.index');
            Route::get('/create',[PageController::class,'create'])->name('admin.content.page.create');
            Route::post('/store',[PageController::class,'store'])->name('admin.content.page.store');
            Route::get('/edit/{page}',[PageController::class,'edit'])->name('admin.content.page.edit');
            Route::put('/update/{page}',[PageController::class,'update'])->name('admin.content.page.update');
        });
    });
    Route::prefix('market')->group(function(){
        // Brand
        Route::prefix('brands')->group(function(){
            Route::get('/',[BrandController::class,'index'])->name('admin.market.brand.index');
            Route::get('/create',[BrandController::class,'create'])->name('admin.market.brand.create');
            Route::post('/store',[BrandController::class,'store'])->name('admin.market.brand.store');
            Route::get('/edit/{brand}',[BrandController::class,'edit'])->name('admin.market.brand.edit');
            Route::put('/update/{brand}',[BrandController::class,'update'])->name('admin.market.brand.update');
        });
        // Category
        Route::prefix('product_categories')->group(function(){
            Route::get('/',[ProductCategoryController::class,'index'])->name('admin.market.product_category.index');
            Route::get('/create',[ProductCategoryController::class,'create'])->name('admin.market.product_category.create');
            Route::post('/store',[ProductCategoryController::class,'store'])->name('admin.market.product_category.store');
            Route::get('/edit/{productCategory}',[ProductCategoryController::class,'edit'])->name('admin.market.product_category.edit');
            Route::put('/update/{productCategory}',[ProductCategoryController::class,'update'])->name('admin.market.product_category.update');
        });
        // Product
        Route::prefix('product')->group(function(){
            Route::get('/',[ProductController::class,'index'])->name('admin.market.product.index');
            Route::get('/create',[ProductController::class,'create'])->name('admin.market.product.create');
            Route::post('/store',[ProductController::class,'store'])->name('admin.market.product.store');
            Route::get('/edit/{product}',[ProductController::class,'edit'])->name('admin.market.product.edit');
            Route::put('/update/{product}',[ProductController::class,'update'])->name('admin.market.productcategory.update');
        });
    });
    Route::prefix('projects')->group(function(){
        Route::get('/',[ProjectController::class,'index'])->name('admin.project.index');
        Route::get('/create',[ProjectController::class,'create'])->name('admin.project.create');
        Route::post('/store',[ProjectController::class,'store'])->name('admin.project.store');
        Route::get('/edit/{project}',[ProjectController::class,'edit'])->name('admin.project.edit');
        Route::put('/update/{project}',[ProjectController::class,'update'])->name('admin.project.update');

        Route::prefix('galleries')->group(function(){
            Route::get('/index/{project}',[ProjectGalleryController::class,'index'])->name('admin.project.gallery.index');
            Route::get('/create/{project}',[ProjectGalleryController::class,'create'])->name('admin.project.gallery.create');
            Route::post('/store/{project}',[ProjectGalleryController::class,'store'])->name('admin.project.gallery.store');
        });

    });
    Route::prefix('profiles')->group(function(){
        Route::get('/',[ProfileController::class,'index'])->name('admin.profile.index');
        Route::get('/edit/{profile}',[ProfileController::class,'edit'])->name('admin.profile.edit');
        Route::put('/update/{profile}',[ProfileController::class,'update'])->name('admin.profile.update');
    });
});

