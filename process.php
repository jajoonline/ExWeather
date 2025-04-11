<?php
require 'vendor/autoload.php';

use App\Api\OpenWeatherProvider;
use App\Export\ExcelExporter;
use App\Utils\ValidatorTrait;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

class WeatherApp
{
    use ValidatorTrait;

    public function run(string $city, string $date)
    {
        if (!$this->validateInputs($city, $date)) {
            header("Location: index.php?error=Neplatné vstupy");
            exit;
        }

        try {
            $provider = new OpenWeatherProvider($city, $date);
            $weather = $provider->fetchWeather();

            $exporter = new ExcelExporter();
            $fileName = $exporter->export($weather);

            header("Location: index.php?file=$fileName");
        } catch (Exception $e) {
            header("Location: index.php?error=" . urlencode($e->getMessage()));
        }
    }
}

$app = new WeatherApp();
$app->run($_POST['city'] ?? '', $_POST['date'] ?? '');