<?php

namespace App\Livewire\Admin\Market\Brand;

use App\Livewire\Admin\SearchableComponent;
use App\Models\Market\Brand;
use Livewire\Component;

class BrandList extends SearchableComponent
{
    protected $listeners = [
        'delete',
        'refreshComponent' => '$refresh'
    ];
    protected function searchableFields(): array
    {
        return ['persian_name','orginal_name'];
    }

    public function deleteConfirm($id):void
    {
        $brand = Brand::query()->find($id);
        $this->dispatch('deleteBrand',brandId: $brand->id);
    }
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id):void
    {
        $brand = Brand::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }
    public function changeStatus($id)
    {
        $brand = Brand::query()->find($id);
        if($brand->status)
            $brand->update(['status' => 0]);
        else
            $brand->update(['status' => 1]);
    }
    public function baseQuery()
    {
        return Brand::query();
    }

    public function render()
    {
        return view('livewire.admin.market.brand.brand-list',['brands' => $this->results]);
    }
}
