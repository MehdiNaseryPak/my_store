<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use SoftDeletes,Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => ['source' => 'name']
        ];
    }
    
    protected $fillable = ['name','slug','status','image','show_in_menu','parent_id'];

    public function parent()
    {
        return $this->belongsTo(self::class,'parent_id');
    }
}
