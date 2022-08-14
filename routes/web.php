<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BenangController;
use App\Http\Controllers\DetailbayarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProduksiController;

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

Route::get('/', [LoginController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/cek', [LoginController::class, 'cek']);

Route::get('/logout', [LogoutController::class, 'index'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/add', [UserController::class, 'add']);
Route::post('/user/insert', [UserController::class, 'insert']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::get('/user/editpassword/{id}', [UserController::class, 'editpassword']);
Route::post('/user/updatepassword/{id}', [UserController::class, 'updatepassword']);
Route::delete('/user/delete/{id}', [UserController::class, 'delete']);

Route::get('/produksi', [ProduksiController::class, 'index'])->name('produksi');
Route::get('/produksi/add', [ProduksiController::class, 'add']);
Route::post('/produksi/insert', [ProduksiController::class, 'insert']);
Route::get('/produksi/edit/{id}', [ProduksiController::class, 'edit']);
Route::post('/produksi/update/{id}', [ProduksiController::class, 'update']);
Route::delete('/produksi/delete/{id}', [ProduksiController::class, 'delete']);
Route::post('/produksi/search', [produksiController::class, 'search']);

Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan');
Route::get('/pesanan/add', [PesananController::class, 'add']);
Route::post('/pesanan/insert', [PesananController::class, 'insert']);
Route::get('/pesanan/edit/{id}', [PesananController::class, 'edit']);
Route::post('/pesanan/update/{id}', [PesananController::class, 'update']);
Route::delete('/pesanan/delete/{id}', [PesananController::class, 'delete']);
Route::post('/pesanan/search', [PesananController::class, 'search']);

Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/profil/add', [ProfilController::class, 'add']);
Route::post('/profil/insert', [ProfilController::class, 'insert']);
Route::delete('/profil/delete/{id}', [ProfilController::class, 'delete']);
Route::get('/profil/edit/{id}', [ProfilController::class, 'edit']);
Route::post('/profil/update/{id}', [ProfilController::class, 'update']);

Route::get('/benang', [BenangController::class, 'index'])->name('benang');
Route::get('/benang/add', [BenangController::class, 'add']);
Route::post('/benang/insert', [BenangController::class, 'insert']);
Route::delete('/benang/delete/{id}', [BenangController::class, 'delete']);
Route::get('/benang/edit/{id}', [BenangController::class, 'edit']);
Route::post('/benang/update/{id}', [BenangController::class, 'update']);

Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
Route::post('/pembayaran/update/{id}', [PembayaranController::class, 'update']);
Route::post('/pembayaran/search', [PembayaranController::class, 'search']);

Route::get('/detailbayar/{pesanan_id}', [DetailbayarController::class, 'index'])->name('detailbayar');
Route::get('/detailbayar/add/{pesanan_id}', [DetailBayarController::class, 'add']);
Route::post('/detailbayar/insert', [DetailBayarController::class, 'insert']);
Route::delete('/detailbayar/delete/{id}', [DetailBayarController::class, 'delete']);
Route::get('/detailbayar/edit/{id}', [DetailBayarController::class, 'edit']);
Route::post('/detailbayar/update/{id}', [DetailBayarController::class, 'update']);

Route::get('generate-laporan-html', array('as' => 'generate.laporan.html', 'uses' => 'PDFController@generateLaporanHTML'));
Route::get('generate-laporan-pdf', array('as' => 'generate.laporan.pdf', 'uses' => 'PDFController@generateLaporanPDF'));
Route::get('generate-invoice-html/{id}', array('as' => 'generate.invoice.html', 'uses' => 'PDFController@generateInvoiceHTML'));
Route::get('generate-invoice-pdf/{id}', array('as' => 'generate.invoice.pdf', 'uses' => 'PDFController@generateInvoicePDF'));
