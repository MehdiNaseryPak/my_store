<?php

namespace App\Livewire\Admin\Market\Product;

use Livewire\Component;
use App\Models\Market\Product;
use App\Livewire\Admin\SearchableComponent;

class ProductList extends SearchableComponent
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
        $product = Product::query()->find($id);
        $this->dispatch('deleteProduct',productId: $product->id);
    }
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id):void
    {
        $product = Product::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }
    public function changeStatus($id)
    {
        $product = Product::query()->find($id);
        if($product->status)
            $product->update(['status' => 0]);
        else
            $product->update(['status' => 1]);
    }
    public function changeMarketable($id)
    {
        $product = Product::query()->find($id);
        if($product->marketable)
            $product->update(['marketable' => 0]);
        else
            $product->update(['marketable' => 1]);
    }
    public function baseQuery()
    {
        return Product::query()->with(['brand','category']);
    }
    public function render()
    {
        return view('livewire.admin.market.product.product-list',['products' => $this->results]);
    }
}
