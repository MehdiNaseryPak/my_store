<?php

use App\Http\Controllers\Admin\Content\BannerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Content\FaqController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\Admin\Content\PageController;
use App\Http\Controllers\Admin\Content\PostController;
use App\Http\Controllers\Admin\Content\PostCategoryController;

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
});

