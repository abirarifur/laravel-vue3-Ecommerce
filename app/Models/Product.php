<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    public function store()
    {
         return $this->hasMany('App\Models\Store', 'product_sku', 'sku');
    }
    public function category()
    {
         return $this->belongsTo('App\Models\Category');
    }
    public function subcategory()
    {
         return $this->belongsTo('App\Models\Subcategory', 'subcategory_id');
    }
}
