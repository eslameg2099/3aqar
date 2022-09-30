<?php

namespace App\Http\Filters;

use App\Models\Order;

class OrderFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'name',
        'is_locked',
        'city_id',
        'type',
        'type_id',
        'price',
        'space',
        'selected_id',
        'sort',
        
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
            return $this->builder->where('name', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Sorting results by the given id.
     *
     * @param $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function selectedId($value)
    {
        if ($value) {
            $this->builder->sortingByIds($value);
        }

        return $this->builder;
    }
    /**
     * @param $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function isLocked($value)
    {
        if ($value) {
            return $this->builder->whereNotNull('locked_at');
        } else {
            return $this->builder->whereNull('locked_at');
        }
    }

    /**
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

    /**
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function type($value)
    {
        return $this->builder->where('type', $value);
    }


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

     

    /**
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function price($value)
    {
        $from = explode(',', $value)[0] ?? Order::query()->min('price_from');

        $to = explode(',', $value)[1] ?? Order::query()->max('price_to');

        return $this->builder
            ->where('price_to', '>=', $from)
            ->where('price_from', '<=', $to);
    }

    /**
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function space($value)
    {
        $from = explode(',', $value)[0] ?? Order::query()->min('space_from');

        $to = explode(',', $value)[1] ?? Order::query()->max('space_to');

        return $this->builder
            ->where('space_to', '>=', $from)
            ->where('space_from', '<=', $to);
    }

    protected function sort($value)
    {
        switch ($value) {
            case 'cheapest':
                $this->builder->oldest('price_from');
                break;
           
            case 'largest':
                $this->builder->latest('space_to');
                break;
            case 'latest':
                $this->builder->latest();
                break;
        }

        return $this->builder;
    }

}
