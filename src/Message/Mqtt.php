<?php


namespace App\Message;


class Mqtt
{
    /** @var string */
    private $cacheKey;

    public function __construct($cacheKey)
    {
        $this->cacheKey = $cacheKey;
    }

    /**
     * @return string
     */
    public function getCacheKey(): string
    {
        return $this->cacheKey;
    }
}