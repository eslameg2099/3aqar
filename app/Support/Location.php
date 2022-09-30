<?php

namespace App\Support;

use JsonSerializable;

class Location implements JsonSerializable
{
    /**
     * @var string|float
     */
    protected $latitude;

    /**
     * @var string|float
     */
    protected $longitude;

    /**
     * Create a location Instance.
     *
     * @param $latitude
     * @param $longitude
     */
    public function __construct($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * Specify data which should be serialized to JSON.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'latitude' => (float) $this->latitude,
            'longitude' => (float) $this->longitude,
        ];
    }

    /**
     * Convert price to string.
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->jsonSerialize());
    }
}
