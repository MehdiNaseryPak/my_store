<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\Content\Post;
use Illuminate\Http\Request;
use Hekmatinasser\Verta\Verta;
use App\Http\Controllers\Controller;
use App\Models\Content\PostCategory;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.contents.posts.index');
    }

    public function create()
    {
        $categories = PostCategory::all();
        return view('admin.contents.posts.create',compact('categories'));
    }

    public function store(CreatePostRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        $inputs['published_at'] = Verta::parse($request->published_at)->toCarbon();
        // dd($inputs);
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.content.post.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        $inputs['author_id'] = 1;

        $post = Post::create($inputs);
        return redirect()->route('admin.content.post.index')->with('swal-success', 'پست  جدید شما با موفقیت ثبت شد');
    }
    public function edit(Post $post)
    {
        $categories = PostCategory::all();
        return view('admin.contents.posts.edit',compact('post','categories'));
    }
    public function update(UpdatePostRequest $request, Post $post,ImageService $imageService)
    {
        $inputs = $request->all();
        $inputs['published_at'] = Verta::parse($request->published_at)->toCarbon();

        if ($request->hasFile('image')) {
            if (!empty($post->image)) {
                $imageService->deleteDirectoryAndFiles($post->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.content.post.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($post->image)) {
                $image = $post->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $inputs['author_id'] = 1;
        $post->update($inputs);
        return redirect()->route('admin.content.post.index')->with('swal-success', 'پست شما با موفقیت ویرایش شد');
    }
}
