<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

$fullName = $_GET['name'] ?? 'No Name';
$month = $_GET['month'] ?? '';
$year = $_GET['year'] ?? '';

$templatePath = __DIR__ . '/DTR.xlsx';

if (!file_exists($templatePath)) {
    die("Template file not found at: $templatePath");
}

$spreadsheet = IOFactory::load($templatePath);
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('C4', $fullName);
$sheet->setCellValue('K4', $fullName);

// Output file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=\"DTR_{$fullName}_{$month}_{$year}.xlsx\"");

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;
