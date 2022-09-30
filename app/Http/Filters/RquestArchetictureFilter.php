<?php

namespace App\Http\Filters;

use Illuminate\Support\Str;

class RquestArchetictureFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
      
        'name',
       
    ];

    

    /**
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function name($value)
    {
        if ($value) {
            return $this->builder->whereHas('user', function ($query) use ($value) {
                $query->where('name', 'like', "%$value%");
            });
        }

        return $this->builder;
    }

  
}
