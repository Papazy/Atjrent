<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JualController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WelcomeController;
require __DIR__.'/auth.php';

// Route::get('/', [WelcomeController::class, 'index']);
Route::auto('/', WelcomeController::class);

Route::middleware('auth')->group(function () {
    Route::auto('/rent', RentController::class);
});
// Route::get('/rent', [RentController::class, 'index']);
// Route::post('/rent/store', [RentController::class, 'store'])->name('rent.store');


Route::get('/sale', [JualController::class, 'index']);
Route::post('/add-to-cart', [JualController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cart', [JualController::class, 'viewCart'])->name('cart.detail');


Route::get('/checkout', function () {
    return view('checkout');
});

// checkout/13/destroy/3
Route::delete('/checkout/destroy/{id}', [RentController::class, 'destroyBarang'])->name('cart.destroyBarang');
Route::get('/profil', function () {
    return view('profil');
});
Route::get('/list_barang', function () {
    return view('list_barang');
});
Route::delete('/list_barang/destroy/{id}', [RentController::class, 'destroy'])->name('rent.destroy');

Route::get('/detail_belanja', [JualController::class, 'viewCart'])->name('detail_belanja');

Route::get('/detail_produk', function () {
    return view('detail_produk');
});
Route::get('/ketentuanakad', function () {
    return view('ketentuanakad');
});
Route::get('/riwayat', function () {
    return view('riwayat');
});


// HHari ini

Route::post('/payment/{amount}', [PaymentController::class, 'processPayment']);
