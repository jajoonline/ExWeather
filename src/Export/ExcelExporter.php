<?php
namespace App\Export;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelExporter
{
    public function export(array $data): string
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->fromArray(['Mesto', 'Dátum', 'Teplota (°C)', 'Počasie'], NULL, 'A1');
        $sheet->fromArray(array_values($data), NULL, 'A2');

        $fileName = 'pocasie_' . time() . '.xlsx';
        $filePath = __DIR__ . '/../../exports/' . $fileName;

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return $fileName;
    }
}
