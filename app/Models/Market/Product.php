<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes,Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => ['source' => 'name']
        ];
    }
    
    protected $fillable = ['name','slug','status','image','marketable','brand_id','introduction'];
    protected $casts = ['image' => 'array'];
    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class,'category_product','product_id','category_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function metas()
    {
        return $this->hasMany(ProductMeta::class);
    }
}
