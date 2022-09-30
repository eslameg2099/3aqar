<?php

namespace App\Http\Filters;

class SponsorFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'name',
        'id',
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function name($value)
    {
        if ($value) {
            return $this->builder->whereHas('user', function ($builder) use ($value) {
                $builder->where('name','like', "%$value%");
            });
        }

        return $this->builder;
    }

    /**
     * Sorting results by the given id.
     *
     * @param $value
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function id($value)
    {
        if ($value) {
            $this->builder->where('id',$value);
        }

        return $this->builder;
    }
}
