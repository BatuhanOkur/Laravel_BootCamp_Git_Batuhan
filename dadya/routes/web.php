<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ExcelDownloadController;
use App\Http\Controllers\ExcelUploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//HomeController
Route::get('/',[HomeController::class,'main']);


//Auth
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $books = \App\Models\Book::all();
    return view('dashboard',compact('books'));
})->name('dashboard');

//CartController
Route::middleware(['auth:sanctum','verified'])->post('/sepete-ekle',[CartController::class,'addToCart'])->name('cart.add');
Route::middleware(['auth:sanctum','verified'])->get('/sepetim',[CartController::class,'cartIndex']);
Route::post('/sepet-sil/{id}',[CartController::class,'deleteCart'])->name('delete.cart');
Route::post('/odeme-yap',[CartController::class,'buyItemsView'])->name('buy.view');
Route::post('/odemeyi-tamamla',[CartController::class,'buyItems'])->name('buy.items');
//Auth

// AdminController
Route::get('/admin',[AdminController::class,'adminView'])->name('admin');


//UserController
Route::get('/kullanici-ekle',[UserController::class,'userCreateView']);
Route::post('/kullanici-kayit',[UserController::class,'userCreate'])->name('user.create');
Route::get('/kullanici-liste',[UserController::class,'userIndex'])->name('user.index');
Route::get('/kullanici-sil/{id}',[UserController::class,'userDelete'])->name('user.delete');
Route::get('/kullanici-guncelle/{id}',[UserController::class,'userUpdateView']);
Route::post('/kullanici-guncelle/{id}',[UserController::class,'userUpdate'])->name('user.update');
Route::get('/kullanici-profil-karti/{id}',[UserController::class,'userCardView'])->name('user.profile-card');
Route::get('/kullanici-islemleri/sureli-yasakla/{id}',[UserController::class,'userTempBanView']);
Route::post('/kullanici-islemleri/sureli-yasakla/{id}',[UserController::class,'userTempBan'])->name('user.temp-ban');
Route::post('/kullanici-islemleri/admin-yap/{id}',[UserController::class,'setAdmin'])->name('user.setadmin');
Route::post('/kullanici-islemleri/admin-yetkisini-al/{id}',[UserController::class,'removeAdmin'])->name('user.removeadmin');

//BookController
Route::get('/kitap-ekle',[BookController::class,'bookCreateView']);
Route::post('/kitap-kayit',[BookController::class,'bookCreate'])->name('book.save');
Route::get('/kitap-liste',[BookController::class,'bookIndex'])->name('book.index');
Route::get('/kitap-sil/{id}',[BookController::class,'bookDelete'])->name('book.delete');
Route::get('/kitap-guncelle/{id}',[BookController::class,'bookUpdateView']);
Route::post('/kitap-guncelle/{id}',[BookController::class,'bookUpdate'])->name('book.update');
Route::get('/kitap-detay/{id}',[BookController::class,'bookDetail']);


//ExcelDownloadController
Route::get('/indir-kitap-liste',[ExcelDownloadController::class,'bookExport'])->name('book.export');
Route::get('/indir-kullanici-liste',[ExcelDownloadController::class,'userExport'])->name('user.export');

//ExcelUploadController
Route::get('/user-import',[ExcelUploadController::class,'userImportView']);
Route::post('/user-import-post',[ExcelUploadController::class,'userImport'])->name('user.import');
Route::get('/book-import',[ExcelUploadController::class,'bookImportView']);
Route::post('/book-import-post',[ExcelUploadController::class,'bookImport'])->name('book.import');

//RefundController
Route::get('/iade-taleplerim',[RefundController::class,'myRefundsIndex'])->name('refund.index');
Route::get('/admin/iade-talepleri',[RefundController::class,'adminRefundsIndex']);
Route::get('/admin/iade-talepleri/{id}',[RefundController::class,'refundShow'])->name('refund.show');
Route::get('/iade-talebi-olustur',[RefundController::class,'createRefundView']);
Route::post('/iade-talebi-olustur',[RefundController::class,'createRefund'])->name('refund.create');
Route::post('/admin/iade-talepleri/talebi-sonuclandir/{id}',[RefundController::class,'solveRefund'])->name('refund.solve');
Route::post('/admin/iade-talepleri/talebi-onayla/{id}',[RefundController::class,'approveRefund'])->name('refund.approve');

//OrderController
Route::get('/admin/siparisler',[OrderController::class,'adminOrdersIndex']);
Route::get('/siparislerim',[OrderController::class,'OrderIndex']);
Route::post('/siparisi-sonuclandir/{id}',[OrderController::class,'deliverOrder'])->name('order.deliver');

