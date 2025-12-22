<?php

namespace App\Livewire\Admin\Content\Banner;

use Livewire\Component;
use App\Models\Content\Banner;
use App\Livewire\Admin\SearchableComponent;

class BannerList extends SearchableComponent
{
    protected $listeners = [
        'delete',
        'refreshComponent' => '$refresh'
    ];
    protected function searchableFields(): array
    {
        return ['title'];
    }

    public function deleteConfirm($id):void
    {
        $banner = Banner::query()->find($id);
        $this->dispatch('deleteBanner',bannerId: $banner->id);
    }
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id):void
    {
        $banner = Banner::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }
    public function changeStatus($id)
    {
        $banner = Banner::query()->find($id);
        if($banner->status)
            $banner->update(['status' => 0]);
        else
            $banner->update(['status' => 1]);
    }
    public function baseQuery()
    {
        return Banner::query();
    }

    public function render()
    {
        $positions = Banner::$positions;
        return view('livewire.admin.content.banner.banner-list',['banners' => $this->results , 'positions' => $positions]);
    }
}
