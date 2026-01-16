<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;

class ProductMeta extends Model
{
    protected $fillable = ['meta_key','meta_value','product_id'];
}
