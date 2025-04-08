<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$city = $_POST['city'] ?? '';
$date = $_POST['date'] ?? '';

if (!$city || !$date) {
    header("Location: index.php?error=Neplatné vstupy");
    exit;
}

$apiKey = 'fa71460b38c7460e4e2223a3b75bc738';
$client = new Client();

try {
    $response = $client->get('http://api.openweathermap.org/data/2.5/forecast', [
        'query' => [
            'q' => $city,
            'appid' => $apiKey,
            'units' => 'metric',
            'lang' => 'sk'
        ]
    ]);

    $data = json_decode($response->getBody(), true);

    $found = false;
    $weatherData = null;

    foreach ($data['list'] as $entry) {
        if (strpos($entry['dt_txt'], $date) !== false) {
            $weatherData = [
                'mesto' => $data['city']['name'],
                'datum' => $date,
                'teplota' => $entry['main']['temp'],
                'pocasie' => $entry['weather'][0]['description']
            ];
            $found = true;
            break;
        }
    }

    if (!$found) {
        header("Location: index.php?error=Nenašla sa predpoveď pre daný dátum");
        exit;
    }

    // Vygeneruj Excel
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->fromArray(['Mesto', 'Dátum', 'Teplota (°C)', 'Počasie'], NULL, 'A1');
    $sheet->fromArray(array_values($weatherData), NULL, 'A2');

    $fileName = 'pocasie_' . time() . '.xlsx';
    $filePath = __DIR__ . '/exports/' . $fileName;

    $writer = new Xlsx($spreadsheet);
    $writer->save($filePath);

    header("Location: index.php?file=$fileName");
} catch (Exception $e) {
    header("Location: index.php?error=Chyba pri získavaní dát: " . urlencode($e->getMessage()));
}