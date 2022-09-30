<?php

namespace App\Http\Filters;

class ReportFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'name',
        'type',
        'owner',
       
    ];

    /**
     * Filter the query by a given name.
     *
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

    protected function type($value)
    {
        if ($value) {
            return $this->builder->where('type', $value);
        }

        return $this->builder;
    }

    protected function owner($value)
    {
        if ($value) {
            return $this->builder->whereHas('user', function ($builder) use ($value) {
                $builder->where('type', $value);
            });
        }

        return $this->builder;
    }
    /**
     * Filter the query by a given city.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    

    /**
     * Sorting results by the given id.
     *
     * @param $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
  
}
