<?php


// use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DatafaskesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/datadasar', function () {
    return view('datadasar');
});

Route::get('/bantuan', function () {
    return view('bantuan');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard']);

Route::get('/datalayanan', function () {
    return view('datalayanan');
});

// Route::get('/datafaskes', function () {
//     return view('datafaskes');
// });

// Route::resource('customer', CustomerController::class);

Route::resource('datafaskes', DatafaskesController::class);


//DASHBOARD

Route::get('/dokter', [DokterController::class, 'dokterPage'])->name('dokter.home');
Route::post('/dokter', [DokterController::class, 'addDokter'])->name('add.dokter');
Route::get('/dokter/{dokter_id}', [DokterController::class, 'getDokterById'])->name('show.dokter');
