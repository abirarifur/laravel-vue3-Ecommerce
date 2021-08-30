<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'images' => 'array'
    ];
    public function style()
    {
         return $this->belongsTo('App\Models\Style');
    }
    public function size()
    {
         return $this->belongsTo('App\Models\Size');
    }
    public function color()
    {
         return $this->belongsTo('App\Models\Color');
    }
}

