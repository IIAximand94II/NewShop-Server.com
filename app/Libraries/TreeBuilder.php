<?php

namespace App\Libraries;

use App\Models\Blog\Comment;

class TreeBuilder
{

    public static function returnTree($array){
        $tree = self::getTree($array);
        return $tree;
    }

    protected static function getTree($array){
        $parents = $array->where('parent_id', 0);
        self::formatTree($parents, $array);

        return $parents;
    }

    protected static function formatTree($parents, $array){
        foreach($parents as $parent){
            $parent->children = $array->where('parent_id', $parent->id)->values();
            if($parent->children->isNotEmpty()){
                self::formatTree($parent->children, $array);
            }
        }
    }

//    public static function returnTree($array){
//        $tree = self::tree($array);
//        //$show_tree = self::showCat($tree, '');
//        //$template = '<select class="form-control" name="category"><option value="0">Independent Category '. $show_tree .'</select>';
//        return $tree;
//    }
//
//    protected static function tree($allCategories){
//        $parentCategories = $allCategories->where('parent_id', 0);
//        self::formatTree($parentCategories, $allCategories);
//
//        return $parentCategories;
//    }
//
//    protected static function formatTree($categories, $allCategories){
//        foreach($categories as $category){
//            $category->children = $allCategories->where('parent_id', $category->id)->values();
//            if($category->children->isNotEmpty()){
//                self::formatTree($category->children, $allCategories);
//            }
//        }
//    }
}
