<?php
namespace App\Api;

use GuzzleHttp\Client;
use Exception;

class OpenWeatherProvider extends WeatherProvider
{
    private string $apiKey;

    public function __construct(string $city, string $date)
    {
        parent::__construct($city, $date);
        $this->apiKey = $_ENV['OPENWEATHER_API_KEY'] ?? '';
    }

    public function fetchWeather(): array
    {
        if (empty($this->apiKey)) {
            throw new Exception("API kľúč nie je nastavený.");
        }

        $client = new Client();

        $response = $client->get('http://api.openweathermap.org/data/2.5/forecast', [
            'query' => [
                'q' => $this->city,
                'appid' => $this->apiKey,
                'units' => 'metric',
                'lang' => 'sk'
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        foreach ($data['list'] as $entry) {
            if (strtotime($this->date) < strtotime($entry['dt_txt'])) {
                $dataExport[] = [
                    'mesto' => $data['city']['name'],
                    'datum' => $entry['dt_txt'],
                    'teplota' => $entry['main']['temp'],
                    'pocasie' => $entry['weather'][0]['description']
                ];
            }
        }

        if (is_array($dataExport)) {
            return $dataExport;
        }

        throw new Exception("Nenašla sa predpoveď pre daný dátum.");
    }
}
