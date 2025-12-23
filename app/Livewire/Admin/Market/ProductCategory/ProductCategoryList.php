<?php

namespace App\Livewire\Admin\Market\ProductCategory;

use App\Livewire\Admin\SearchableComponent;
use App\Models\Market\ProductCategory;
use Livewire\Component;

class ProductCategoryList extends SearchableComponent
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
        $category = ProductCategory::query()->find($id);
        $this->dispatch('deleteCategory',categoryId: $category->id);
    }
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id):void
    {
        $category = ProductCategory::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }
    public function changeStatus($id)
    {
        $category = ProductCategory::query()->find($id);
        if($category->status)
            $category->update(['status' => 0]);
        else
            $category->update(['status' => 1]);
    }
    public function changeShowInMenu($id)
    {
        $category = ProductCategory::query()->find($id);
        if($category->show_in_menu)
            $category->update(['show_in_menu' => 0]);
        else
            $category->update(['show_in_menu' => 1]);
    }
    public function baseQuery()
    {
        return ProductCategory::query();
    }
    public function render()
    {
        return view('livewire.admin.market.product-category.product-category-list',['categories' => $this->results]);
    }
}
