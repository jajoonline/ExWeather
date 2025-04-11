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

        // Style the header
        $headerStyle = [
            'font' => ['bold' => true],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'D9E1F2']
            ]
        ];
        $sheet->getStyle('A1:D1')->applyFromArray($headerStyle);

        // Auto-size columns
        foreach (range('A', 'D') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Wrap text for all rows with data
        $lastRow = count($data) + 1;
        $sheet->getStyle("A1:D{$lastRow}")->getAlignment()->setWrapText(true);

        $sheet->fromArray(['Mesto', 'Dátum a čas', 'Teplota (°C)', 'Počasie'], NULL, 'A1');

        $i = 2;
        foreach ($data as $entry) {
            $sheet->fromArray(array_values($entry), NULL, 'A'.$i );
            $i++;
        }

        $fileName = 'pocasie_' . time() . '.xlsx';
        $filePath = __DIR__ . '/../../exports/' . $fileName;

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return $fileName;
    }
}
