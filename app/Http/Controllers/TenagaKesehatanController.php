<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TenagaKesehatanModel;
use App\Models\KonsentrasiNakesModel;
use App\Models\SpesialisDokterModel;
use App\Models\OrganisasiModel;
use DataTables;
use Alert;
use Illuminate\Support\Facades\DB;

class TenagaKesehatanController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = DB::table('tenaga_kesehatan')
            ->join('konsentrasi_nakes', 'tenaga_kesehatan.id_konsentrasi', '=', 'konsentrasi_nakes.id_konsentrasi')
            ->join('spesialis_dokter', 'tenaga_kesehatan.id_spesialis', '=', 'spesialis_dokter.id_spesialis')
            ->join('organisasi', 'tenaga_kesehatan.id_organisasi', '=', 'organisasi.id_organisasi')
            ->select('tenaga_kesehatan.*', 'konsentrasi_nakes.nama_konsentrasi', 'spesialis_dokter.nama_spesialis',  'organisasi.name_organisasi')
            ->latest()
            ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_nakes="'.$row->id_nakes.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-warning btn-icon-text editData">Edit <i
                    class="bi bi-pencil-square"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.tenaga-kesehatan.tenagaKesehatan', [
            'konsentrasiNakes' => KonsentrasiNakesModel::all()->where('defunct_ind', 'N'),
            'spesialisDokter' => SpesialisDokterModel::all()->where('defunct_ind', 'N'),
            'organisasi' => OrganisasiModel::all()->where('defunct_ind', 'N')
        ]);
    }

    public function store(Request $request) {

        $nakes = $request->id_nakes;
        TenagaKesehatanModel::updateOrCreate([
            'id_nakes' => $nakes
        ],
        [
            'nama_nakes' => $request->nama_nakes,
            'id_konsentrasi' => $request->id_konsentrasi,
            'id_spesialis' => $request->id_spesialis,
            'id_organisasi' => $request->id_organisasi,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($nakes);
    }

    public function edit(Request $request)
    {
        $where = array('id_nakes' => $request->id_nakes);
        $nakes  = TenagaKesehatanModel::where($where)->first();
        return response()->json($nakes);
    }
}
