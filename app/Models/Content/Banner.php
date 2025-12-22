<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    protected $fillable = ['title','image','url','status','position'];
    protected $casts = ['image' => 'array'];
    public static $positions = [
        0 => 'صفحه ی اصلی قسمت اسلایدر',        
    ];
}
