<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes,Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'original_name'
            ]
            ];
    }

    protected $casts = ['logo' => 'array'];
    protected $fillable = ['original_name' ,'slug','logo','persian_name','status'];

}
