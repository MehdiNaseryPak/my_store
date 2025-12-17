<?php

namespace App\Models\Content;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes,Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
            ];
    }

    protected $casts = ['image' => 'array','published_at' => 'datetime',];
    protected $fillable = ['title' ,'slug','image','summary','body','commentable','status','published_at','author_id','category_id'];

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'auther_id');
    }
}
