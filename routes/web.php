<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SopirController;
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
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/akun', AkunController::class);
    Route::resource('/sopir', SopirController::class);
    Route::resource('/mobil', MobilController::class);
    Route::resource('/pengiriman', PengirimanController::class);
    Route::resource('/history', HistoryController::class);
    Route::get('/pengiriman/cetakpdf', 'PengirimanController@cetakpdf')->name('pengiriman.cetakpdf');
    Route::post('/logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');});


require __DIR__ . '/auth.php';
