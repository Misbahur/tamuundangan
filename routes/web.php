<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    TamuController,
};

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
//     return view('buku');
// });
Route::get('/', [TamuController::class, 'index'])->name('landing');
Route::get('hadirkan/{tamu}', [TamuController::class, 'edit'])->name('hadirkan');
Route::get('tamu/cari', [TamuController::class, 'search'])->name('cari');
Route::post('tambahtamu', [TamuController::class, 'store'])->name('tambahtamu');

Route::get('report', [TamuController::class, 'report'])->name('report');
Route::get('lengkap', [TamuController::class, 'lengkap'])->name('lengkap');
Route::get('pdfhadir', [TamuController::class, 'hadir'])->name('pdf');

Route::get('pns', function () {
    return view('pns');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
