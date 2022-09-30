<?php

namespace App\Http\Requests\Concerns;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

trait HasPrefix
{

    /**
     * Get the data that starts with the given prefix from request.
     *
     * @param $prefix
     * @return array
     */
    public function prefixedWith($prefix): array
    {
        return collect($this->all())->filter(function ($value, $key) use ($prefix) {
            return Str::startsWith($key, $prefix);
        })->mapWithKeys(function ($value, $key) use ($prefix) {
            return [str_replace($prefix, '', $key) => $value];
        })->toArray();
    }

    /**
     * Get the data that doesn't starts with the given prefix from request.
     *
     * @param $prefix
     * @return array
     */
    public function prefixedWithout($prefix): array
    {
        return collect($this->all())->filter(function ($value, $key) use ($prefix) {
            return ! Str::startsWith($key, $prefix);
        })->mapWithKeys(function ($value, $key) use ($prefix) {
            return [str_replace($prefix, '', $key) => $value];
        })->toArray();
    }
}
