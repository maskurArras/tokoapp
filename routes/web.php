<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// route login
Route::get('/', fn () => redirect()->route('login'));

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('home');
})->name('dashboard');


// grouping middleware karena sudah login
Route::group(['middleware' => 'auth'], function () {
    // route CRUD Kategori
    Route::get('/kategori/data', [KategoriController::class, 'data'])->name('kategori.data');
    route::resource('kategori', KategoriController::class);

    // route CRUD Produk
    Route::get('/produk/data', [ProdukController::class, 'data'])->name('produk.data');
    // delete produk multiple
    Route::post('/produk/delete-selected', [ProdukController::class, 'deleteSelected'])->name('produk.delete_selected');
    // route cetak barcode
    Route::post('/produk/cetak-barcode', [ProdukController::class, 'cetakBarcode'])->name('produk.cetak_barcode');
    Route::resource('/produk', ProdukController::class);
});
