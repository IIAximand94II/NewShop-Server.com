<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{

    const GENDERS = 'genders';
    const CATEGORIES = 'categories';
    const COLORS = 'colors';
    const SIZES = 'sizes';
    const PRICE = 'price';
    const EXISTENCE = 'existence';
    const TAGS = 'tags';


    protected function getCallbacks(): array
    {
        return [
            self::PRICE => [$this, 'price'],
            self::COLORS => [$this, 'colors'],
            self::SIZES => [$this, 'sizes'],
            self::CATEGORIES => [$this, 'categories'],
            self::GENDERS => [$this, 'genders'],
            self::EXISTENCE => [$this, 'existence'],
            self::TAGS => [$this, 'tags'],
        ];
    }

    protected function price(Builder $builder, $value){
        $builder->whereHas('group', function($b) use($value){
            $b->whereBetween('price', $value);
        });
    }

    protected function genders(Builder $builder, $value){
        $builder->whereIn('gender', $value);
    }


    protected function categories(Builder $builder, $value){
        $builder->whereIn('category_id', $value);
    }

    protected function colors(Builder $builder, $value){
        $builder->whereHas('group', function($b) use($value){
            $b->whereIn('color_id', $value);
        });
    }

    protected function sizes(Builder $builder, $value){
        $builder->whereHas('productGroupSizes', function($b) use($value){
            $b->whereIn('size_id', $value);
        });
    }

    protected function existence(Builder $builder, $value){
        $builder->whereIn('existence', $value);
    }

    protected function tags(Builder $builder, $value){
        $builder->whereHas('tags', function($b) use($value){
            $b->whereIn('tag_id', $value);
        });
    }


}
