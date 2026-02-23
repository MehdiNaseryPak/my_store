<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariantAttribute extends Model
{
    use SoftDeletes;
    protected $table = 'product_variant_attribute';
    protected $fillable = ['product_variant_id','category_attribute_id','value'];

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
    public function categoryAttribute()
    {
        return $this->belongsTo(CategoryAttribute::class);
    }
}
