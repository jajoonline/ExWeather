<?php
namespace App\Api;

abstract class WeatherProvider
{
    protected string $city;
    protected string $date;

    public function __construct(string $city, string $date)
    {
        $this->city = $city;
        $this->date = $date;
    }

    abstract public function fetchWeather(): array;
}
