<?php

namespace App\Livewire\Admin\Content\Menu;

use App\Livewire\Admin\SearchableComponent;
use App\Models\Content\Menu;
use Livewire\Component;

class MenuList extends SearchableComponent
{
    protected $listeners = [
        'delete',
        'refreshComponent' => '$refresh'
    ];
    protected function searchableFields(): array
    {
        return ['name'];
    }

    public function deleteConfirm($id):void
    {
        $menu = Menu::query()->find($id);
        $this->dispatch('deleteMenu',menuId: $menu->id);
    }
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id):void
    {
        $menu = Menu::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }
    public function changeStatus($id)
    {
        $menu = Menu::query()->find($id);
        if($menu->status)
            $menu->update(['status' => 0]);
        else
            $menu->update(['status' => 1]);
    }
    public function baseQuery()
    {
        return Menu::query()->with('parent');
    }
    public function render()
    {
        return view('livewire.admin.content.menu.menu-list',['menus' => $this->results]);
    }
}
