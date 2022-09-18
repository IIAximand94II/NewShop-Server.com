<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Filterable;

    use HasFactory;
    protected $table = 'products';
    protected $guarded = false;

    public function group(){
        return $this->belongsTo(ProductGroup::class);
    }

    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function sizes(){
        return $this->belongsToMany(Size::class, 'product_sizes', 'product_id', 'size_id');
    }

//    public function colors(){
//        return $this->belongsToMany(Color::class, 'product_colors', 'product_id', 'color_id');
//    }

//    public function reviews(){
//        return $this->hasMany(Review::class);
//    }

//    public function group(){
//        return $this->hasMany(ProductGroup::class);
//    }

//    public function productGroupSizes(){
//        return $this->hasManyThrough(ProductGroupSize::class, ProductGroup::class, 'product_id', 'group_id');
//    }


    public function uniqueSizes(){
        return $this->belongsToMany(Size::class, 'product_sizes', 'product_id', 'size_id')->distinct();
    }

    public function gallery(){
        return $this->hasMany(ProductGallery::class, 'product_id', 'id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }
}
