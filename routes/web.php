<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('banhang.index');
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

use App\Http\Controllers\PageController;
Route::get('/trangchu', [PageController::class, 'getIndex'])->name('banhang.index');
Route::get('/chitiet/{sanpham_id}', [PageController::class, 'getChiTiet'])->name('banhang.chitiet');
Route::get('/add-to-cart/{id}', [PageController::class, 'addToCart'])->name('banhang.addtocart');

Route::get('/shopping-cart', function(){
    return view('shopping_cart');
})->name('banhang.shoppingcart');

Route::get('/checkout', function(){
    return view('checkout');
})->name('banhang.checkout');

//đăng ký và đăng nhập của khách hàng
Route::get('/dangky', [PageController::class, 'getSignin'])->name('getsignin');
Route::post('/dangky', [PageController::class, 'postSignin'])->name('postsignin');

Route::get('/dangnhap', [PageController::class, 'getLogin'])->name('getlogin');
Route::post('/dangnhap', [PageController::class, 'postLogin'])->name('postlogin');

Route::get('/dangxuat', [PageController::class, 'getLogout'])->name('getlogout');

Route::get('/search', [PageController::class, 'getSearch'])->name('banhang.search');

Route::get('/del-cart/{id}', [PageController::class, 'getDelItemCart'])->name('banhang.deletecart');
Route::get('/update-cart/{id}/{qty}', [PageController::class, 'getUpdateItemCart'])->name('banhang.updatecart');

Route::post('/checkout', [PageController::class, 'postCheckout'])->name('banhang.postcheckout');

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\AdminLoginMiddleware;

Route::get('/admin/dangnhap',[UserController::class,'getLogin'])->name('admin.getLogin');
Route::post('/admin/dangnhap',[UserController::class,'postLogin'])->name('admin.postLogin');
Route::get('/admin/dangxuat',[UserController::class,'getLogout'])->name('admin.logout');

Route::prefix('admin')->group(function () {
    Route::middleware([AdminLoginMiddleware::class])->group(function () {
        Route::group(['prefix'=>'category'],function(){
             Route::get('danhsach',[CategoryController::class,'getCateList'])->name('admin.getCateList');
             Route::get('them',[CategoryController::class,'getCateAdd'])->name('admin.getCateAdd');
             Route::post('them',[CategoryController::class,'postCateAdd'])->name('admin.postCateAdd');
             Route::get('xoa/{id}',[CategoryController::class,'getCateDelete'])->name('admin.getCateDelete');
             Route::get('sua/{id}',[CategoryController::class,'getCateEdit'])->name('admin.getCateEdit');
             Route::post('sua/{id}',[CategoryController::class,'postCateEdit'])->name('admin.postCateEdit');
         });

        Route::group(['prefix'=>'product'],function(){
            Route::get('danhsach',[ProductController::class,'getProductList'])->name('admin.getProductList');
            Route::get('them',[ProductController::class,'getProductAdd'])->name('admin.getProductAdd');
            Route::post('them', [ProductController::class, 'postProductAdd'])->name('admin.postProductAdd');
            Route::get('sua/{id}', [ProductController::class, 'getProductEdit'])->name('admin.getProductEdit');
            Route::post('sua/{id}', [ProductController::class, 'postProductEdit'])->name('admin.postProductEdit');
            Route::get('xoa/{id}', [ProductController::class, 'getProductDelete'])->name('admin.getProductDelete');
        });

        Route::group(['prefix'=>'user'],function(){
            Route::get('danhsach',[UserController::class,'getUserList'])->name('admin.getUserList');
            Route::get('xoa/{id}',[UserController::class,'getUserDelete'])->name('admin.getUserDelete');
        });

        Route::group(['prefix'=>'order'],function(){
            Route::get('danhsach',[OrderController::class,'getOrderList'])->name('admin.getOrderList');
        });
   });
});
