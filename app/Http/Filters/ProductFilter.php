<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{

    const GENDERS = 'genders';
    const COLORS = 'colors';
    const CATEGORIES = 'categories';
    const SIZES = 'sizes';
    const PRICE = 'price';
    const EXISTENCE = 'existence';
    const TAGS = 'tags';


    protected function getCallbacks(): array
    {
        return [
            //self::GENDERS => [$this, 'genders'],
            //self::COLORS => [$this, 'colors'],
            self::CATEGORIES => [$this, 'categories'],
            //self::SIZES => [$this, 'sizes'],
            //self::PRICE => [$this, 'price'],
            //self::EXISTENCE => [$this, 'existence'],
            self::TAGS => [$this, 'tags'],
        ];
    }

//    protected function genders(Builder $builder, $value){
//        $builder->whereIn('gender', $value);
//    }
//
//    protected function colors(Builder $builder, $value){
//
//    }

    protected function categories(Builder $builder, $value){
        $builder->whereIn('existence', $value);
    }

//    protected function sizes(Builder $builder, $value){
//
//    }
//
//    protected function price(Builder $builder, $value){
//        $builder->whereBetween($value['from'], $value['to']);
//    }
//
//    protected function existence(Builder $builder, $value){
//        $builder->whereIn('existence', $value);
//    }

    protected function tags(Builder $builder, $value){
        $builder->whereHas('tags', function($b) use($value){
            $b->whereIn('tag_id', $value);
        });
    }


}
