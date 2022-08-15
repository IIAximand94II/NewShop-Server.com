<?php


namespace App\Libraries;

use App\Models\Category;

class CategoryMenu
{
    public static $value;
    public static $disabled;

    public static function run(){
        $tree = self::tree();
        //$show_tree = self::showCat($tree, '');
        //$template = '<select class="form-control" name="category"><option value="0">Independent Category '. $show_tree .'</select>';
        return $tree;
    }

    public static function tree(){
        $allCategories = Category::get();
        $parentCategories = $allCategories->where('parent_id', 0);
        self::formatTree($parentCategories, $allCategories);

        return $parentCategories;
    }

    public static function formatTree($categories, $allCategories){
        foreach($categories as $category){
            $category->children = $allCategories->where('parent_id', $category->id)->values();
            if($category->children->isNotEmpty()){
                self::formatTree($category->children, $allCategories);
            }
        }
    }

    public static function tplMenu($category, $str){
        if($category->parent_id === 0){
            $menu = '<option class="text-danger" value="'.$category->id.'">'.$category->title.'</option>';
        }else{
            //dd("It's work!!!");
            $menu = '<option value="'.$category->id.'>'.$str.' '.$category->title.'</option>';
        }

        if(isset($category->children)){
            $i = 1;
            for($j = 0; $j < $i; $j++){
                $str .= '→';
            }
            $i++;
            $menu .= self::showCat($category->children, $str);
        }
        return $menu;
    }

    public static function showCat($data, $str){
        $string = '';
        foreach($data as $item){
            $string .= self::tplMenu($item, $str);
        }
        return $string;
    }
}
