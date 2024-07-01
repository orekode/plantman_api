<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [
        "id",
        "created_at",
        "updated_at"
    ];

    public function products(){
        return $this->belongsToMany(Product::class, "order_products","order_id","product_id")->withPivot('quantity', 'price');;
    }

    public function orderProducts(){
        return $this->hasMany(OrderProduct::class, "order_id");
    }

    public function images()
    {
        return $this->hasManyThrough(ProductImage::class, OrderProduct::class, 'order_id', 'product_id', 'id', 'product_id');
    }
}
