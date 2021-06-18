<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected  $guarded = [];


    public function brand()
    {
        return $this->hasOne(Brand::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function type()
    {
        return $this->hasOne(Type::class);
    }
}
