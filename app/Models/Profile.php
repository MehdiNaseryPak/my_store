<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['title_fa','title_en','summary_fa','summary_en','introduction_fa','introduction_en','image'];
}
