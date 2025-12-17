<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\Content\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateMenuRequest;
use App\Http\Requests\Menu\UpdateMenuRequest;

class MenuController extends Controller
{
    public function index()
    {
        return view('admin.contents.menus.index');
    }

    public function create()
    {
        $menus = Menu::all();
        return view('admin.contents.menus.create',compact('menus'));
    }

    public function store(CreateMenuRequest $request)
    {
        $inputs = $request->all();
        $menu = Menu::create($inputs);
        return redirect()->route('admin.content.menu.index')->with('swal-success', 'منو  جدید شما با موفقیت ثبت شد');
    }
    public function edit(Menu $menu)
    {
        $parent_menus  = Menu::query()->except($menu)->get();
        return view('admin.contents.menus.edit',compact('menu','parent_menus'));
    }
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $inputs = $request->all();
        $menu->update($inputs);
        return redirect()->route('admin.content.menu.index')->with('swal-success', 'منو شما با موفقیت ویرایش شد');
    }
}
