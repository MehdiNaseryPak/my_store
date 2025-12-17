<?php

namespace App\Livewire\Admin\Content\PostCategory;

use App\Livewire\Admin\SearchableComponent;
use Livewire\Component;
use App\Models\Content\PostCategory;

class PostCategoryList extends SearchableComponent
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
        $category = PostCategory::query()->find($id);
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
        $category = PostCategory::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }
    public function changeStatus($id)
    {
        $category = PostCategory::query()->find($id);
        if($category->status)
            $category->update(['status' => 0]);
        else
            $category->update(['status' => 1]);
    }
    public function baseQuery()
    {
        return PostCategory::query();
    }


    public function render()
    {
        return view('livewire.admin.content.post-category.post-category-list',['categories' => $this->results]);
    }
}
