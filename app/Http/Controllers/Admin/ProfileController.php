<?php

namespace App\Http\Controllers\Admin;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profiles.index');
    }
    public function edit(Profile $profile)
    {
        return view('admin.profiles.edit',compact('profile'));
    }
    public function update(Request $request, Profile $profile,ImageService $imageService)
    {
        $validation = $request->validate([
            'title_fa' => 'required|min:2|max:255',
            'title_en' => 'required|min:2|max:255',
            'summary_fa' => 'required|min:2|max:255',
            'summary_en' => 'required|min:2|max:255',
            'introduction_fa' => 'required|min:2|max:255',
            'introduction_en' => 'required|min:2|max:255',
        ]);
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            if (!empty($profile->image)) {
                $imageService->deleteImage($profile->image);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'profile');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.profile.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (!empty($profile->image)) {
                $image = $profile->image;
                $inputs['image'] = $image;
            }
        }
        $profile->update($inputs);
        return redirect()->route('admin.profile.index')->with('swal-success', 'پروفایل شما با موفقیت ویرایش شد');
    }
}
