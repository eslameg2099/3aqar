<?php

namespace App\Support;

use JsonSerializable;
use App\Models\Concerns\HasYoutubeUrl;

class Youtube implements JsonSerializable
{
    use HasYoutubeUrl;

    /**
     * @var string
     */
    protected $url;

    /**
     * Create Youtube Instance.
     *
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Get the youtube url.
     *
     * @return string
     */
    public function getYoutubeUrl()
    {
        return $this->url;
    }

    /**
     * Specify data which should be serialized to JSON.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'youtube_id' => $this->getYoutubeId(),
            'link' => $this->getYoutubeUrl(),
        ];
    }

    /**
     * Convert price to string.
     *
     * @return string
     */
    public function __toString()
    {
        return (string) data_get($this->jsonSerialize(), 'formatted');
    }
}
