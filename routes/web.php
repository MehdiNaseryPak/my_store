<?php

use App\Http\Controllers\Admin\Content\PostCategoryController;
use Illuminate\Support\Facades\Route;

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
    });
});

