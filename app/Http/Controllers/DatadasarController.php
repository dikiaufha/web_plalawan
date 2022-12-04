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
            ->select('tenaga_kesehatan.*', 'konsentrasi_nakes.nama', 'spesialis_dokter.nama',  'organisasi.name_organisasi')
            ->latest()
            ->get()
            ->where('defunct_ind', 'N');
            return Datatables::of($nakes)
            ->make(true);
        return view('datadasar', compact('data'));
    }

}
