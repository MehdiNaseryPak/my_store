<?php

namespace App\Livewire\Admin\Content\Faq;

use App\Livewire\Admin\SearchableComponent;
use App\Models\Content\Faq;
use Livewire\Component;

class FaqList extends SearchableComponent
{
    protected $listeners = [
        'delete',
        'refreshComponent' => '$refresh'
    ];
    protected function searchableFields(): array
    {
        return ['question','answer'];
    }

    public function deleteConfirm($id):void
    {
        $faq = Faq::query()->find($id);
        $this->dispatch('deleteFaq',faqId: $faq->id);
    }
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id):void
    {
        $faq = Faq::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }
    public function changeStatus($id)
    {
        $faq = Faq::query()->find($id);
        if($faq->status)
            $faq->update(['status' => 0]);
        else
            $faq->update(['status' => 1]);
    }
    public function baseQuery()
    {
        return Faq::query();
    }

    public function render()
    {
        return view('livewire.admin.content.faq.faq-list',['faqs' => $this->results]);
    }
}
