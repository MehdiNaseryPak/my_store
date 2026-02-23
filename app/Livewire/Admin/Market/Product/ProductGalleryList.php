<?php

namespace App\Livewire\Admin\Market\Product;

use Livewire\Component;
use App\Models\Market\ProductImage;
use App\Livewire\Admin\SearchableComponent;

class ProductGalleryList extends SearchableComponent
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
        $productImage = ProductImage::query()->find($id);
        $this->dispatch('deleteProductImage',productImageId: $productImage->id);
    }
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id):void
    {
        $productImage = ProductImage::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }

    public function changeStatus($id)
    {
        $productImage = ProductImage::query()->find($id);
        if($productImage->status)
            $productImage->update(['status' => 0]);
        else
            $productImage->update(['status' => 1]);
    }
    public function baseQuery()
    {
        return ProductImage::query()->where('product_id',$this->productId);
    }
    public function render()
    {
        return view('livewire.admin.market.product.product-gallery-list',['productImages' => $this->results]);
    }
}
