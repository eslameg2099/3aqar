<?php

namespace App\Http\Filters;

use Illuminate\Support\Str;

class ArchetictureFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'type_id',
        'category',
        'name',
     
    ];

    /**
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
   

    /**
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
   

    /**
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function typeId($value)
    {
        if ($value) {
            return $this->builder->where('type_id', $value);
        }

        return $this->builder;
    }

    protected function category($value)
    {
        if ($value) {
            return $this->builder->where('category_id', $value);
        }

        return $this->builder;
    }

    /**
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function name($value)
    {
        if ($value) {
            return $this->builder->whereTranslationLike('name', "%$value%");
        }

        return $this->builder;
    }
    
}
