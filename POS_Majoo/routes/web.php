<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\ProdukController;

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


/*
|----------------------
| LOGIN dan HOME
|----------------------
*/
// Route ke Halaman Login
Route::get('login', [AuthController::class, 'index'])->name('login.show');
// Route ke function Login
Route::post('login', [AuthController::class, 'Login'])->name('login');
// Route ke Halaman Dashboard
Route::get('home', [HomeController::class, 'index'])->name('vdashboard');

/*
|----------------------
| CATALOG PRODUK
|----------------------
*/
//Route ke halaman catalog produk
Route::get('catalog',[CatalogController::class, 'index'])->name('vcatalog');


/*
|----------------------
| CRUD PRODUK
|----------------------
*/
//Route ke halaman produk
Route::get('produk',[ProdukController::class, 'index'])->name('vproduk');
//Route ke halaman Tambah produk
Route::get('produk/tambah',[ProdukController::class, 'create'])->name('create.produk');
//Route Tambah produk
Route::post('produk/tambah',[ProdukController::class, 'store'])->name('store.produk');
//Route ke halaman Edit produk
Route::get('produk/edit/{id_produk}',[ProdukController::class, 'edit'])->name('edit.produk');
//Route update produk
Route::post('produk/edit/{id_produk}',[ProdukController::class, 'update'])->name('update.produk');
//Route delete produk
Route::get('produk/delete/{id_produk}',[ProdukController::class, 'delete'])->name('delete.produk');

/*
|----------------------
| CRUD KATEGORI PRODUK
|----------------------
*/
//Route ke halaman kategori
Route::get('kategoriproduk',[KategoriProdukController::class, 'index'])->name('vkategori');
//Route ke halaman Tambah kategori
Route::get('kategori/tambah',[KategoriProdukController::class, 'create'])->name('create.kategori');
//Route Tambah kategori
Route::post('kategori/tambah',[KategoriProdukController::class, 'store'])->name('store.kategori');
//Route ke halaman Edit produk
Route::get('kategori/edit/{id_kategori}',[KategoriProdukController::class, 'edit'])->name('edit.kategori');
//Route update kategori
Route::post('kategori/edit/{id_kategori}',[KategoriProdukController::class, 'update'])->name('update.kategori');
//Route delete kategori
Route::get('kategori/delete/{id_kategori}',[KategoriProdukController::class, 'delete'])->name('delete.kategori');