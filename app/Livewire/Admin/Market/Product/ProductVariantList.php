<?php

namespace App\Livewire\Admin\Market\Product;

use App\Livewire\Admin\SearchableComponent;
use App\Models\Market\ProductVariant;
use Livewire\Component;

class ProductVariantList extends SearchableComponent
{
    protected $listeners = [
        'delete',
        'refreshComponent' => '$refresh'
    ];
    public $productId;
 
    public function mount($productId = null)
    {
        $this->productId = $productId;
    }
    protected function searchableFields(): array
    {
        return [];
    }

    public function deleteConfirm($id):void
    {
        $productVariant = ProductVariant::query()->find($id);
        $this->dispatch('deleteProductVariant',productVariantId: $productVariant->id);
    }
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id):void
    {
        $productVariant = ProductVariant::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }

    public function changeStatus($id)
    {
        $productVariant = ProductVariant::query()->find($id);
        if($productVariant->status)
            $productVariant->update(['status' => 0]);
        else
            $productVariant->update(['status' => 1]);
    }
    public function baseQuery()
    {
        return ProductVariant::query()->where('product_id',$this->productId);
    }
    public function render()
    {
        return view('livewire.admin.market.product.product-variant-list',['variants' => $this->results]);
    }
}
