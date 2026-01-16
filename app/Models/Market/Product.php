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
    
    protected $fillable = ['name','slug','status','image','marketable','category_id','brand_id','introduction','price','weight','length','width','height'];
    protected $casts = ['image' => 'array'];
    public function category()
    {
        return $this->belongsTo(ProductCategory::class,'category_id');
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
