<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Project\CreateProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.projects.index');
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(CreateProjectRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'project');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.project.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        $project = Project::create($inputs);
        return redirect()->route('admin.project.index')->with('swal-success', 'پروژه  جدید شما با موفقیت ثبت شد');
    }
    public function edit(Project $project)
    {
        return view('admin.projects.edit',compact('project'));
    }
    public function update(UpdateProjectRequest $request, Project $project,ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            if (!empty($project->image)) {
                $imageService->deleteImage($project->image);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'project');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.project.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (!empty($project->image)) {
                $image = $project->image;
                $inputs['image'] = $image;
            }
        }
        $project->update($inputs);
        return redirect()->route('admin.project.index')->with('swal-success', 'پروژه شما با موفقیت ویرایش شد');
    }
}
