<?php

namespace App\Http\Filters;

use Illuminate\Support\Str;

class EstateFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'name',
        'description',
        'type',
        'type_id',
        'city_id',
        'space',
        'price',
        'owner_type',
        'user_type',
        'user_name',
        'office_name',
        'sort',
        'is_sold',
        'is_locked',
        'selected_id',
        'number',
    ];

    /**
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

    protected function number($value)
    {
        if ($value) {
            return $this->builder->where('id',$value);
        }

        return $this->builder;
    }

    /**
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function description($value)
    {
        if ($value) {
            return $this->builder->where('description', 'like', "%$value%");
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
    protected function city_id($value)
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
    protected function space($value)
    {
        if ($value) {
        if (Str::contains($value, ',')) {
            $from = explode(',', $value)[0];
            $to = explode(',', $value)[1];
            $this->builder->whereBetween('space', [$from, $to]);
        } else {
            $this->builder->where('space', $value);
        }
    }

        return $this->builder;
    }

    /**
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function price($value)
    {
        if ($value) {
        if (Str::contains($value, ',')) {
            $from = explode(',', $value)[0];
            $to = explode(',', $value)[1];
            $this->builder->whereBetween('price', [$from, $to]);
        } else {
            $this->builder->where('price', $value);
        }
    }

        return $this->builder;
    }

    /**
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function ownerType($value)
    {
        if ($value) {
            return $this->builder->whereHas('user', function ($builder) use ($value) {
                $builder->where('type', $value);
            });
        }

        return $this->builder;
    }

    /**
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function userType($value)
    {
        if ($value) {
            return $this->builder->where('user_type', $value);
        }

        return $this->builder;
    }

    /**
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function userName($value)
    {
        if ($value) {
            return $this->builder->whereHas('user', function ($query) use ($value) {
                $query->where('name', 'like', "%$value%");
            });
        }

        return $this->builder;
    }

    /**
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function officeName($value)
    {
        if ($value) {
            return $this->builder->whereHas('user.office', function ($query) use ($value) {
                $query->where('name', 'like', "%$value%");
            });
        }

        return $this->builder;
    }

    /**
     * @param string $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function sort($value)
    {
        switch ($value) {
            case 'cheapest':
                $this->builder->oldest('price');
                break;
            case 'nearest':
                if ($this->request->latitude && $this->request->longitude) {
                    $this->builder->distance($this->request->latitude, $this->request->longitude)->oldest('distance');
                }
                break;
            case 'largest':
                $this->builder->latest('space');
                break;
            case 'latest':
                $this->builder->latest();
                break;
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
    public function isSold($value)
    {
        if ($value) {
            return $this->builder->whereNotNull('sold_at');
        } else {
            return $this->builder->whereNull('sold_at');
        }
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
}
