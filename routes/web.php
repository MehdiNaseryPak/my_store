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
use App\Http\Controllers\Admin\Market\ProductGalleryController;
use App\Http\Controllers\Admin\Market\ProductVariantController;
use App\Http\Controllers\Admin\Market\ProductCategoryController;
use App\Http\Controllers\Admin\Market\ProductVariantAttributeController;

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
            Route::put('/update/{product}',[ProductController::class,'update'])->name('admin.market.product.update');
            // galleries
            Route::prefix('galleries')->group(function(){
                Route::get('/{product:id}',[ProductGalleryController::class,'index'])->name('admin.market.product.gallery.index');
                Route::get('/create/{product:id}',[ProductGalleryController::class,'create'])->name('admin.market.product.gallery.create');
                Route::post('/store/{product:id}',[ProductGalleryController::class,'store'])->name('admin.market.product.gallery.store');
            });
            // variants
            Route::prefix('variants')->group(function(){
                Route::get('/{product:id}',[ProductVariantController::class,'index'])->name('admin.market.product.variant.index');
                Route::get('/create/{product:id}',[ProductVariantController::class,'create'])->name('admin.market.product.variant.create');
                Route::post('/store/{product:id}',[ProductVariantController::class,'store'])->name('admin.market.product.variant.store');
                Route::get('/edit/{product}/{productVariant}',[ProductVariantController::class,'edit'])->name('admin.market.product.variant.edit');
                Route::put('/update/{product}/{productVariant}',[ProductVariantController::class,'update'])->name('admin.market.product.variant.update');
                // attributes
                Route::prefix('attributes')->group(function(){
                    Route::get('/{productVariant:id}',[ProductVariantAttributeController::class,'index'])->name('admin.market.product.variant.attribute.index');
                    Route::get('/create/{productVariant:id}',[ProductVariantAttributeController::class,'create'])->name('admin.market.product.variant.attribute.create');
                    Route::post('/store/{productVariant:id}',[ProductVariantAttributeController::class,'store'])->name('admin.market.product.variant.attribute.store');
                    Route::get('/edit/{productVariant}/{productVariantAttribute}',[ProductVariantAttributeController::class,'edit'])->name('admin.market.product.variant.attribute.edit');
                    Route::put('/update/{productVariant}/{productVariantAttribute}',[ProductVariantAttributeController::class,'update'])->name('admin.market.product.variant.attribute.update');
                });
            
            });
        });
    });
});

