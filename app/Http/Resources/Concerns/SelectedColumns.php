<?php

namespace App\Http\Resources\Concerns;

use Illuminate\Http\Resources\MissingValue;

trait SelectedColumns
{
    /**
     * Retrieve an attribute when it has been selected.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  mixed  $default
     * @return \Illuminate\Http\Resources\MissingValue|mixed
     */
    protected function whenSelected($attribute, $value = null, $default = null)
    {
        if (func_num_args() < 3) {
            $default = new MissingValue();
        }

        if (! array_key_exists($attribute, $this->resource->getOriginal())) {
            return value($default);
        }

        if (func_num_args() === 1) {
            return $this->resource->{$attribute};
        }

        if ($this->resource->{$attribute} === null) {
            return;
        }

        return value($value);
    }
}