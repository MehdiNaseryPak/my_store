<?php

namespace App\Livewire\Admin\Content\Page;

use App\Livewire\Admin\SearchableComponent;
use App\Models\Content\Page;
use Livewire\Component;

class PageList extends SearchableComponent
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
        $page = Page::query()->find($id);
        $this->dispatch('deletePage',pageId: $page->id);
    }
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id):void
    {
        $page = Page::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }
    public function changeStatus($id)
    {
        $page = Page::query()->find($id);
        if($page->status)
            $page->update(['status' => 0]);
        else
            $page->update(['status' => 1]);
    }
    public function baseQuery()
    {
        return Page::query();
    }
    public function render()
    {
        return view('livewire.admin.content.page.page-list',['pages' => $this->results]);
    }
}
