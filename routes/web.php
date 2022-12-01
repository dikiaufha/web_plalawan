<?php


// use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DatafaskesController;
use App\Http\Controllers\LanggamController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataDasarController;
use App\Http\Controllers\ApotikController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\KonsentrasiNakesController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\SpesialisDokterController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\JenisOrganisasiController;
use App\Http\Controllers\KondisiAsetPertahunController;
use App\Http\Controllers\JenisAsetController;
use App\Http\Controllers\StatusKawinController;
use App\Http\Controllers\StatusKeluargaController;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\TahunAsetController;
use App\Http\Controllers\KecamatanController;
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

//DATA KECAMATAN

Route::get('/datakecamatan', function () {
    return view('datakecamatan');
});

Route::get('/langgam', function () {
    return view('datakecamatan.langgam');
});

Route::get('/bandarpetalangan', function () {
    return view('datakecamatan.bandarpetalangan');
});

Route::get('/bandarsaikijang', function () {
    return view('datakecamatan.bandarsaikijang');
});

Route::get('/telukmeranti', function () {
    return view('datakecamatan.telukmeranti');
});

Route::get('/kerumutan', function () {
    return view('datakecamatan.kerumutan');
});

Route::get('/plalawan', function () {
    return view('datakecamatan.plalawan');
});

Route::get('/bunut', function () {
    return view('datakecamatan.bunut');
});

Route::get('/ukui', function () {
    return view('datakecamatan.ukui');
});

Route::get('/pangkalankerinci', function () {
    return view('datakecamatan.pangkalankerinci');
});

Route::get('/pangkalanlesung', function () {
    return view('datakecamatan.pangkalanlesung');
});

Route::get('/pangkalankuras', function () {
    return view('datakecamatan.pangkalankuras');
});

Route::get('/kualakampar', function () {
    return view('datakecamatan.kualakampar');
});



// Route::resource('langgam', LanggamController::class);

//INFO DATA

Route::get('/datadesa', function () {
    return view('infodata.datadesa');
});

Route::get('/datakendaraanbermotor', function () {
    return view('infodata.datakendaraanbermotor');
});

Route::get('/datamobil', function () {
    return view('infodata.datamobil');
});

Route::get('/dataserana', function () {
    return view('infodata.dataserana');
});

//DATA DASAR

Route::get('/datanaskes', function () {
    return view('datadasar.datanaskes');
});

Route::get('/datasarpras', function () {
    return view('datadasar.datasarpras');
});

Route::get('/datakegiatan', function () {
    return view('datadasar.datakegiatan');
});

Route::get('/tokoalkes', function () {
    return view('datadasar.tokoalkes');
});

Route::get('/datalaboratorium', function () {
    return view('datadasar.datalaboratorium');
});

Route::get('/datatempatpraktek', function () {
    return view('datadasar.datatempatpraktek');
});

Route::get('/datapusatreabilitasi', function () {
    return view('datadasar.datapusatreabilitasi');
});

Route::get('/dataitemjaminankesehatan', function () {
    return view('datadasar.dataitemjaminankesehatan');
});


//DATA LAYANAN

Route::get('/datakunjunganrsud', function () {
    return view('datalayanan.datakunjunganrsud');
});

Route::get('/datapasiendirujuk', function () {
    return view('datalayanan.datapasiendirujuk');
});

Route::get('/data10penyakit', function () {
    return view('datalayanan.data10penyakit');
});

Route::get('/datapasienmeninggal', function () {
    return view('datalayanan.datapasienmeninggal');
});

Route::get('/datakunjunganpasienkepuskesmas', function () {
    return view('datalayanan.datakunjunganpasienkepuskesmas');
});

Route::get('/datapasiendirujukdaripuskesmas', function () {
    return view('datalayanan.datapasiendirujukdaripuskesmas');
});

Route::get('/datapasiendirujukdaripolikliknik', function () {
    return view('datalayanan.datapasiendirujukdaripolikliknik');
});

Route::get('/datapersalinan', function () {
    return view('datalayanan.datapersalinan');
});

Route::get('/data10kalifikasiobat', function () {
    return view('datalayanan.data10kalifikasiobat');
});

Route::get('/datavaksin', function () {
    return view('datalayanan.datavaksin');
});

Route::get('/datasebaranpenyakit', function () {
    return view('datalayanan.datasebaranpenyakit');
});


// DATA ENTITAS

Route::get('/dataentitas', function () {
    return view('dataentitas');
});

Route::get('/datasarpras', function () {
    return view('dataentitas.datasarpras');
});

Route::get('/datanakes', function () {
    return view('dataentitas.datanakes');
});

Route::get('/datanon', function () {
    return view('dataentitas.datanon');
});

// DASHBOARD URL START

Route::resource('/apotik', ApotikController::class);
Route::post('/apotik-edit', [ApotikController::class, 'edit'])->name('apotik.edit');
//
Route::resource('/tahun', TahunController::class);
Route::post('/tahun-edit', [TahunController::class, 'edit'])->name('tahun.edit');
//
Route::resource('/kecamatan', KecamatanController::class);
Route::post('/kecamatan-edit', [KecamatanController::class, 'edit'])->name('kecamatan.edit');
//
Route::resource('/jenis-organisasi', JenisOrganisasiController::class);
Route::post('/jenis-organisasi-edit', [JenisOrganisasiController::class, 'edit'])->name('jenis-organisasi.edit');
//
Route::resource('/desa', DesaController::class);
Route::post('/desa-edit', [DesaController::class, 'edit'])->name('desa.edit');
//
Route::resource('/konsentrasi-nakes', KonsentrasiNakesController::class);
Route::post('/konsentrasi-nakes-edit', [KonsentrasiNakesController::class, 'edit'])->name('konsentrasi-nakes.edit');
//
Route::resource('/spesialis-dokter', SpesialisDokterController::class);
Route::post('/spesialis-dokter-edit', [SpesialisDokterController::class, 'edit'])->name('spesialis-dokter.edit');
//
Route::resource('/penyakit', PenyakitController::class);
Route::post('/penyakit-edit', [PenyakitController::class, 'edit'])->name('penyakit.edit');
//
Route::resource('/organisasi', OrganisasiController::class);
Route::post('/organisasi-edit', [OrganisasiController::class, 'edit'])->name('organisasi.edit');
//
Route::resource('/jenis-aset', JenisAsetController::class);
Route::post('/jenis-aset-edit', [JenisAsetController::class, 'edit'])->name('jenis-aset.edit');
//
Route::resource('/jenis-aset', JenisAsetController::class);
Route::post('/jenis-aset-edit', [JenisAsetController::class, 'edit'])->name('jenis-aset.edit');
//
Route::resource('/tahun-aset', TahunAsetController::class);
Route::post('/tahun-aset-edit', [TahunAsetController::class, 'edit'])->name('tahun-aset.edit');
//
Route::resource('/kondisiaset-pertahun', KondisiAsetPertahunController::class);
Route::post('/kondisiaset-pertahun-edit', [KondisiAsetPertahunController::class, 'edit'])->name('kondisiaset-pertahun.edit');
//
Route::resource('/kartu-keluarga', KartuKeluargaController::class);
Route::post('/kartu-keluarga-edit', [KartuKeluargaController::class, 'edit'])->name('kartu-keluarga.edit');
//
Route::resource('/status-kawin', StatusKawinController::class);
Route::post('/status-kawin-edit', [StatusKawinController::class, 'edit'])->name('status-kawin.edit');
//
Route::resource('/agama', AgamaController::class);
Route::post('/agama-edit', [AgamaController::class, 'edit'])->name('agama.edit');
//
Route::resource('/status-dalamkeluarga', StatusKeluargaController::class);
Route::post('/status-dalamkeluarga-edit', [StatusKeluargaController::class, 'edit'])->name('status-dalamkeluarga.edit');
//
Route::resource('/keluarga', KeluargaController::class);
Route::post('/keluarga-edit', [KeluargaController::class, 'edit'])->name('keluarga.edit');

// DASHBOARD URL END

// DATADASAR URL START

Route::get('/datadasar', [DataDasarController::class, 'tablePage']);

// DATADASAR URL END
