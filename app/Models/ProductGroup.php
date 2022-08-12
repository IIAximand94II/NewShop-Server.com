<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGroup extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'product_groups';


    public function color(){
        return $this->hasMany(Color::class, 'id', 'color_id');
    }

    public function sizes(){
        return $this->belongsToMany(Size::class, 'product_group_sizes', 'group_id', 'size_id');
    }

    public function uniqueSizes(){
        return $this->belongsToMany(Size::class, 'product_group_sizes', 'group_id', 'size_id')->distinct();
    }

    public function gallery(){
        return $this->hasMany(ProductGallery::class, 'product_id', 'id');
    }
}
