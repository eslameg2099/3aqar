<?php

namespace App\Http\Filters;

class AdvisorFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
    
        'city_id',
        'name',
      
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
   

    /**
     * Filter the query by a given city.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function cityId($value)
    {
        if ($value) {
            return $this->builder->whereHas('cities', function ($builder) use ($value) {
                $builder->where('city_id', $value);
            });
        }

        return $this->builder;
    }

    protected function name($value)
    {
        if ($value) {
            return $this->builder->whereHas('cities', function ($builder) use ($value) {
                $builder->whereTranslationLike('name', "%$value%");
                
            });
        }

        return $this->builder;
    }

    /**
     * Sorting results by the given id.
     *
     * @param $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
  
}
