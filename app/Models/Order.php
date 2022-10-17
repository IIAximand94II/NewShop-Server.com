<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = false;
    protected $table = 'orders';

    public function products(){
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id');
    }

    public function product(){
        return $this->HasMany(OrderProduct::class, 'order_id', 'id');
    }
}
