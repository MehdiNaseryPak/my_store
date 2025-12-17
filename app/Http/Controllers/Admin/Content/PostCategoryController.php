<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCategory\CreatePostCategoryRequest;
use App\Http\Requests\PostCategory\updatePostCategoryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Content\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    public function index()
    {
        return view('admin.contents.post_categories.index');
    }

    public function create()
    {
        return view('admin.contents.post_categories.create');
    }

    public function store(CreatePostCategoryRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();

        
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post-category');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.content.post_category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        $postCategory = PostCategory::create($inputs);
        return redirect()->route('admin.content.post_category.index')->with('swal-success', 'دسته بندی  جدید شما با موفقیت ثبت شد');
    }
    public function edit(PostCategory $postCategory)
    {
        return view('admin.contents.post_categories.edit',compact('postCategory'));
    }
    public function update(UpdatePostCategoryRequest $request, PostCategory $postCategory,ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            if (!empty($postCategory->image)) {
                $imageService->deleteDirectoryAndFiles($postCategory->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post-category');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.content.post_category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($postCategory->image)) {
                $image = $postCategory->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $postCategory->update($inputs);
        return redirect()->route('admin.content.post_category.index')->with('swal-success', 'دسته بندی شما با موفقیت ویرایش شد');
    }

}
