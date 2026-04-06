<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('cars.index');
});

use App\Http\Controllers\CarController;
use App\Http\Controllers\FoodController;

Route::resource('cars', CarController::class);
Route::resource('foods', FoodController::class);

Route::get('locale/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'vi'])) {
        session(['locale' => $lang]);
    }
    return back();
})->name('locale.change');

Route::get('/read-pdf', function () {
    $pdfFilePath = base_path('laravel-xdudxe.pdf');
    
    if (!file_exists($pdfFilePath)) {
        return "File không tồn tại ở: " . $pdfFilePath;
    }

    try {
        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile($pdfFilePath);
        $text = $pdf->getText();
        
        return "<pre>" . htmlspecialchars($text) . "</pre>";
    } catch (\Exception $e) {
        return "Lỗi: " . $e->getMessage();
    }
});
