<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [
        "id",
        "created_at",
        "updated_at"
    ];

    public function categories(){
        return $this->belongsToMany(ProductCategory::class, "product_to_categories","product_id","category_id");
    }

    public function images(){
        return $this->hasMany(ProductImage::class,"product_id");
    }
}
