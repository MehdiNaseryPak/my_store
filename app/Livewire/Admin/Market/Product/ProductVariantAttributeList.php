<?php

namespace App\Livewire\Admin\Market\Product;

use App\Livewire\Admin\SearchableComponent;
use App\Models\Market\ProductVariantAttribute;
use Livewire\Component;

class ProductVariantAttributeList extends SearchableComponent
{
    protected $listeners = [
        'delete',
        'refreshComponent' => '$refresh'
    ];
    public $productVariantId;
 
    public function mount($productVariantId = null)
    {
        $this->productVariantId = $productVariantId;
    }
    protected function searchableFields(): array
    {
        return [];
    }

    public function deleteConfirm($id):void
    {
        $productVariantAttribute = ProductVariantAttribute::query()->find($id);
        $this->dispatch('deleteProductVariantAttribute',productVariantAttributeId: $productVariantAttribute->id);
    }
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id):void
    {
        $productVariantAttribute = ProductVariantAttribute::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }

    public function baseQuery()
    {
        return ProductVariantAttribute::query()->with(['productVariant','categoryAttribute'])->where('product_variant_id',$this->productVariantId);
    }
    public function render()
    {
        return view('livewire.admin.market.product.product-variant-attribute-list',['attributes' => $this->results]);
    }
}
