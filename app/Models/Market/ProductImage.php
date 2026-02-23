<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = ['product_id','image'];
    protected $casts = ['image' => 'array'];
}
