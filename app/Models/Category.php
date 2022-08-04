<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'categories';
    protected $guarded = false;


//    public static function tree(){
//        $allCategories = Category::get();
//
//        $parentCategories = $allCategories->where('parent_id', 0);
//
//        self::formatTree($parentCategories, $allCategories);
//
//        return $parentCategories;
//    }
//
//    public static function formatTree($categories, $allCategories){
//        foreach($categories as $category){
//            $category->children = $allCategories->where('parent_id', $category->id)->values();
//
//            if($category->children->isNotEmpty()){
//                self::formatTree($category->children, $allCategories);
//            }
//
//        }
//    }

}
