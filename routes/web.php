<?php

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\GendreController;
use App\Http\Controllers\Admin\JenisController;
use App\Http\Controllers\Admin\peminjamanController;
use App\Http\Controllers\Admin\PengembalianController;
use App\Http\Controllers\Admin\reservasiController;
use App\Http\Controllers\Admin\UlasanController;
use App\Http\Controllers\BukuCustomerController;
use App\Http\Controllers\chartController;
use App\Http\Controllers\Customer\CustomerController as CustomerCustomerController;
use App\Http\Controllers\Customer\PeminjamanController as CustomerPeminjamanController;
use App\Http\Controllers\Customer\PengembalianController as CustomerPengembalianController;
use App\Http\Controllers\Customer\PengembalianCustomer;
use App\Http\Controllers\Customer\ReservasiController as CustomerReservasiController;
use App\Http\Controllers\Customer\ReservasiCustomer;
use App\Http\Controllers\Customer\UlasanController as CustomerUlasanController;
use App\Http\Controllers\Customer\UlasanCustomer;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\Front\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\FrontCustomerController;
use App\Http\Controllers\Frontend\BukuController as FrontendBukuController;
use App\Http\Controllers\yourController;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
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

// BUAT ADMIN
Route::controller(FrontController::class)->group(function(){
    Route::get('/','Test')->name('index.home');
    Route::get('/buku', 'Buku')->name('admin.buku');
    Route::get('/Review', 'review')->name('admin.review');
    Route::get('/Peminjaman', 'peminjaman')->name('admin.peminjaman');
    Route::get('/Borrow', 'Borrow')->name('admin.Borrow');
    Route::get('/buku/fiksi', 'fiksi')->name('buku.fiksi');
    Route::get('/buku/nonfiksi', 'nonfiksi')->name('buku.nonfiksi');
    // BUKU GENDRE
    Route::get('/buku/romance', 'Romance')->name('buku.romance');
    Route::get('/buku/fantacy', 'fantacy')->name('buku.fantacy');
    Route::get('/Slick','Slick' )->name('Slick');
    Route::get('/Card','Card' )->name('Card');
    Route::get('/search', 'search')->name('search');

   });

// DATA BASE

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::controller(BaseController::class)->group(function(){
        Route::get('/home', 'index')->name('index.home');
        Route::get('/chart', 'chart')->name('chart.home');
    });

    Route::resource('customer', CustomerController::class);
    Route::resource('jenis', JenisController::class);
    Route::resource('gendre', GendreController::class);
    Route::resource('buku', BukuController::class);
    Route::resource('reservasi', reservasiController::class);
    Route::resource('peminjaman', peminjamanController::class);
    Route::resource('ulasan', UlasanController::class);
    Route::resource('pengembalian', PengembalianController::class);


    Route::controller(chartController::class)->group(function(){
        Route::get('/chart', 'index')->name('index.chart');
    });
});
  


// buat customer
Route::prefix('customer')->middleware(['auth', 'isCustomer'])->group(function(){
    Route::controller(CustomerCustomerController::class)->group(function(){
        Route::get('/home', 'index')->name('customer.index.home');
        Route::get('/buku/customer', 'buku')->name('buku.customer');
        Route::get('/profile/customer', 'profile')->name('profile.customer');
    });
    Route::controller(CustomerPengembalianController::class)->group(function(){
        Route::get('/home/pengembalian', 'index')->name('Customer.index.pengembalian');
        Route::post('/customer/create/pengembalian', 'createPengembalianCustomer')->name('customer.create.pengembalian');
        Route::get('/customer/form/pengembalian', 'formPengembalianCustomer')->name('customer.create.form.pengembalian');
        Route::put('/customer/update/pengembalian/{id}', 'updatePengembalianCustomer')->name('customer.update.customer');
        Route::get('/customer/edit/pengembalian/{id}', 'editPengembalianCustomer')->name('customer.update.form.customer');
        Route::delete('/customer/delete/pengembalian/{id}', 'deletePengembalianCustomer')->name('customer.delete.customer');
    });
    Route::controller(CustomerPeminjamanController::class)->group(function(){
        Route::get('/home/peminjaman', 'index')->name('Customer.index.peminjaman');
        Route::post('/customer/create/peminjaman', 'createPeminjamanCustomer')->name('customer.create.peminjaman');
        Route::get('/customer/form/peminjaman', 'formPeminjamanCustomer')->name('customer.create.form.peminjaman');
        Route::put('/customer/update/peminjaman/{id}', 'updatePeminjamanCustomer')->name('customer.update.peminjaman');
        Route::get('/customer/edit/peminjaman/{id}', 'editPeminjamanCustomer')->name('customer.update.form.peminjaman');
        Route::delete('/customer/delete/peminjaman/{id}', 'deletePeminjamanCustomer')->name('customer.delete.peminjaman');
    });
    Route::controller(CustomerUlasanController::class)->group(function(){
        Route::get('/home/ulasan', 'index')->name('Customer.index.ulasan');
        Route::post('/customer/create/ulasan', 'createUlasanCustomer')->name('customer.create.ulasan');
        Route::get('/customer/form/ulasan', 'formUlasanCustomer')->name('customer.create.form.ulasan');
        Route::put('/customer/update/ulasan/{id}', 'updateUlasanCustomer')->name('customer.update.ulasan');
        Route::get('/customer/edit/ulasan/{id}', 'editUlasanCustomer')->name('customer.update.form.ulasan');
        Route::delete('/customer/delete/ulasan/{id}', 'deleteUlasanCustomer')->name('customer.delete.ulasan');
    });
    Route::controller(CustomerReservasiController::class)->group(function(){
        Route::get('/home/reservasi', 'index')->name('Customer.index.reservasi');
        Route::post('/customer/create/reservasi', 'createreservasiCustomer')->name('customer.create.reservasi');
        Route::get('/customer/form/reservasi', 'formreservasiCustomer')->name('customer.create.form.reservasi');
        Route::put('/customer/update/reservasi/{id}', 'updatereservasiCustomer')->name('customer.update.reservasi');
        Route::get('/customer/edit/reservasi/{id}', 'editreservasiCustomer')->name('customer.update.form.reservasi');
        Route::delete('/customer/delete/reservasi/{id}', 'deletereservasiCustomer')->name('customer.delete.reservasi');
    });

    Route::controller(FrontCustomerController::class)->group(function(){
        Route::get('/customer', 'customer')->name('customer');
        Route::get('/arsip', 'arsip')->name('arsip');
        Route::get('/landingpadge', 'landingpadge')->name('landingpadge');
        Route::get('/Pengembalian', 'pengembalian')->name('Profile');
        Route::get('/Profile', 'Profile')->name('Profile');
        Route::get('/landingcustomer','LandingCustomer')->name('index.home');
        Route::get('/buku', 'Buku')->name('admin.buku');
        Route::get('/Peminjaman', 'peminjaman')->name('admin.peminjaman');
        Route::get('/Borrow', 'Borrow')->name('admin.Borrow');
        Route::get('/Borrow/create', 'BorrowCreate')->name('admin.Borrow');
        Route::get('/review/{id}', 'review')->name('review');        
        Route::get('/revie/{id}', 'revie')->name('revie');        
        Route::get('/komentar', 'komentar')->name('komentar');        
       // NAVBAR
        Route::get('/NavbarCustomer', 'NavbarCustomer')->name('Navbar.Customer');
        Route::get('/NavbarCustomerDepan', 'NavbarCustomerDepan')->name('Navbar.Customer.Depan');
        Route::get('/populer', 'populer')->name('populer');
        Route::get('/getFavorites', 'getFavorites')->name('getFavorites');
        Route::get('/filter', 'filter')->name('filter');
        Route::get('/nonfiksi', 'nonfiksi')->name('nonfiksi');
        Route::get('/romance', 'romance')->name('romance');
        Route::get('/fantacy', 'fantacy')->name('fantacy');
        Route::get('/ilmiah', 'ilmiah')->name('ilmiah');
    });
   Route::controller(yourController::class)->group(function(){
    Route::get('/index', 'index')->name('index');
    Route::get('/search', 'search')->name('search');
   });
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


