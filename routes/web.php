<?php

use Illuminate\Support\Facades\Route;
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
        // PostCategory
        Route::prefix('posts')->group(function(){
            Route::get('/',[PostController::class,'index'])->name('admin.content.post.index');
            Route::get('/create',[PostController::class,'create'])->name('admin.content.post.create');
            Route::post('/store',[PostController::class,'store'])->name('admin.content.post.store');
            Route::get('/edit/{post}',[PostController::class,'edit'])->name('admin.content.post.edit');
            Route::put('/update/{post}',[PostController::class,'update'])->name('admin.content.post.update');
        });
    });
});

