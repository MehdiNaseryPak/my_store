<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','status','url','parent_id'];

    public function parent()
    {
        return $this->belongsTo(self::class,'parent_id');
    }
}
