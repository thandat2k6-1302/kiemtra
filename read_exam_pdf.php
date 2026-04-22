<?php
require 'vendor/autoload.php';

$pdfFilePath = 'c:\\xampp\\htdocs\\PHIẾU CHẤM ĐIỂM BÀI THI CUỐI KỲ.pdf';

if (!file_exists($pdfFilePath)) {
    echo "File not found: " . $pdfFilePath . PHP_EOL;
    exit;
}

try {
    $parser = new \Smalot\PdfParser\Parser();
    $pdf = $parser->parseFile($pdfFilePath);
    $text = $pdf->getText();
    echo $text;
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
