<?php
require 'vendor/autoload.php';
$pdfFilePath = 'c:\\xampp\\htdocs\\PHIẾU CHẤM ĐIỂM BÀI THI CUỐI KỲ.pdf';
$parser = new \Smalot\PdfParser\Parser();
$pdf = $parser->parseFile($pdfFilePath);
$text = $pdf->getText();
file_put_contents('exam_text.txt', $text);
