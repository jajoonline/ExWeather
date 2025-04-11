<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['city'])) {
    setcookie('city', $_POST['city'], time() + (86400 * 30), "/"); // 30 days
}

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

        $provider = new OpenWeatherProvider($city, $date);

        try {
            $weather = $provider->fetchWeather();
        } catch (Exception $e) {
            if (str_contains($e->getMessage(), 'city not found') || str_contains($e->getMessage(), 'Mesto')) {
                header("Location: index.php?error=" . urlencode("Zadané mesto sa nenašlo."));
            } else {
                header("Location: index.php?error=" . urlencode($e->getMessage()));
            }
            exit;
        }

        $exporter = new ExcelExporter();
        $fileName = $exporter->export($weather);

        header("Location: index.php?file=$fileName");
    }
}

$app = new WeatherApp();
$app->run($_POST['city'] ?? '', $_POST['date'] ?? '');