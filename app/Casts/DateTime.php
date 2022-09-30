<?php

namespace App\Casts;

use DateTimeZone;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class DateTime implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string                              $key
     * @param mixed                               $value
     * @param array                               $attributes
     *
     * @return \Carbon\Carbon
     */
    public function get($model, $key, $value, $attributes)
    {
        $date = Carbon::parse($value);

        return $date->setTimezone($this->getClientTimezone());
    }

    /**
     * Prepare the given value for storage.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string                              $key
     * @param mixed                               $value
     * @param array                               $attributes
     *
     * @return \Carbon\Carbon
     */
    public function set($model, $key, $value, $attributes)
    {
        $date = Carbon::parse($value);

        return $date->setTimezone($this->getDefaultTimezone());
    }

    /**
     * Retrieve the client timezone.
     *
     * @throws \Exception
     */
    public function getClientTimezone(): string
    {
        if (auth()->check() && $timezone = auth()->user()->timezone) {
            return $timezone;
        }

        $timezone = data_get(DateTimeZone::listIdentifiers(
            DateTimeZone::PER_COUNTRY,
            geoip()->getLocation()->iso_code
        ), 0);

        return $timezone ?: $this->getDefaultTimezone();
    }

    /**
     * Retrieve the default timezone.
     */
    public function getDefaultTimezone(): string
    {
        return config('app.timezone');
    }
}
