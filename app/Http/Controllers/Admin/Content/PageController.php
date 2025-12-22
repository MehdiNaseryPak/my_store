<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\Content\Menu;
use App\Models\Content\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Page\CreatePageRequest;
use App\Http\Requests\Page\UpdatePageRequest;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.contents.pages.index');
    }

    public function create()
    {
        $pages = Page::all();
        return view('admin.contents.pages.create',compact('pages'));
    }

    public function store(CreatePageRequest $request)
    {
        $inputs = $request->all();
        $page = Page::create($inputs);
        return redirect()->route('admin.content.page.index')->with('swal-success', 'صفحه  جدید شما با موفقیت ثبت شد');
    }
    public function edit(Page $page)
    {
        return view('admin.contents.pages.edit',compact('page'));
    }
    public function update(UpdatePageRequest $request, Page $page)
    {
        $inputs = $request->all();
        $page->update($inputs);
        return redirect()->route('admin.content.page.index')->with('swal-success', 'صفحه شما با موفقیت ویرایش شد');
    }
}
