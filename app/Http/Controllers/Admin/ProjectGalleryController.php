<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;

class ProjectGalleryController extends Controller
{
    public function index(Project $project)
    {
        return view('admin.projects.galleries.index',compact('project'));
    }

    public function create(Project $project)
    {
        return view('admin.projects.galleries.create',compact('project'));
    }

    public function store(Project $project,Request $request, ImageService $imageService)
    {
        $validate = $request->validate([
            ['image' => 'required|image|mimes:png,jpg,webp,gif'],
            ['status' => 'required|numeric|in:0,1']
        ]);
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'project-gallery');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.project.gallery.index',$project->id)->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        $project = $project->galleries()->create($inputs);
        return redirect()->route('admin.project.gallery.index',$project->id)->with('swal-success', 'عکس پروژه  جدید شما با موفقیت ثبت شد');
    }
}
