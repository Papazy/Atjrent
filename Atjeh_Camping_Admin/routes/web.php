<?php

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DetailkeranjangsewaController;
use App\Http\Controllers\JualController;
use App\Http\Controllers\SewaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

// Route::get('/about', function () {
//     return view('about');
// })->name('about');

Route::auto('/admin/role', RoleController::class);
Route::auto('/admin/menu', MenuController::class);
Route::auto('/admin/user', UserController::class);
Route::auto('/master/barang', BarangController::class);
Route::auto('/transaksi/jual', JualController::class);
Route::get('/transaksi/jual/{id}', [JualController::class, 'detail'])->name('jual.detail');
Route::get('/transaksi/sewa/{id}', [SewaController::class, 'detail'])->name('sewa.detail');
Route::auto('/transaksi/sewa', SewaController::class);
Route::auto('/keranjang/keranjangsewa', DetailkeranjangsewaController::class);

Route::post('/transaksi/sewa/{id}/status/{status}', [SewaController::class, 'updateStatus']);


