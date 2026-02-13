<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title_fa','title_en','image','introduction_fa','introduction_en','status'];

    public function galleries()
    {
        return $this->hasMany(ProjectGallery::class,'project_id');
    }
}
