<?php


namespace App\Services;


use App\Models\Category;

class CategoryService
{
    public static $value;

    public static function run($value=null){
        self::$value = $value;
        $tree = self::tree();
        $show_tree = self::showCat($tree, '');
        //$template = '<select class="form-control" name="category"><option value="0">Independent Category '. $show_tree .'</select>';
        return $show_tree;
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
        $select = $category->id === self::$value ? 'selected' : '';
        if($category->parent_id === 0){
            $menu = '<option class="text-danger" '.$select.' value="'.$category->id.'">'.$category->title.'</option>';
        }else{
            //dd("It's work!!!");
            $menu = '<option value="'.$category->id.'" '.$select.'>'.$str.' '.$category->title.'</option>';
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
