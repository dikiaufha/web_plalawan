<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApotikModel;
use App\Models\TenagaKesehatanModel;
use App\Models\KonsentrasiNakesModel;
use App\Models\SpesialisDokterModel;
use App\Models\OrganisasiModel;
use Illuminate\Support\Facades\DB;
use DataTables;

class DataDasarController extends Controller
{
    public function tablePage() {
        $data = ApotikModel::all()->where('defunct_ind', 'N');
        $nakes = DB::table('tenaga_kesehatan')
        ->join('konsentrasi_nakes', 'tenaga_kesehatan.id_konsentrasi', '=', 'konsentrasi_nakes.id_konsentrasi')
        ->join('spesialis_dokter', 'tenaga_kesehatan.id_spesialis', '=', 'spesialis_dokter.id_spesialis')
        ->join('organisasi', 'tenaga_kesehatan.id_organisasi', '=', 'organisasi.id_organisasi')
        ->select('tenaga_kesehatan.*', 'konsentrasi_nakes.nama_konsentrasi', 'spesialis_dokter.nama_spesialis', 'organisasi.name_organisasi')
        ->latest()
        ->get()
        ->where('defunct_ind', 'N');
        $organisasi = DB::table('organisasi')
            ->join('kecamatan', 'organisasi.id_kec', '=', 'kecamatan.id_kec')
            ->join('desa', 'organisasi.id_desa', '=', 'desa.id_desa')
            ->join('jenis_organisasi', 'organisasi.id_jenis', '=', 'jenis_organisasi.id_jenis')
            ->select('organisasi.*', 'kecamatan.nama_kecamatan', 'desa.nama_desa',  'jenis_organisasi.nama_organisasi')
            ->latest()
            ->get();

        return view('datadasar', compact('data', 'nakes', 'organisasi'));
    }

}
