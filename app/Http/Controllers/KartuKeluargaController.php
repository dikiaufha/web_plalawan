<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KartuKeluargaModel;
use App\Models\DesaModel;
use Alert;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class KartuKeluargaController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = DB::table('kartu_keluarga')
                    ->join('desa', 'kartu_keluarga.id_desa', '=', 'desa.id_desa')
                    ->select('kartu_keluarga.*', 'desa.nama_desa')
                    ->latest()
                    ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_kartu_keluarga="'.$row->id_kartu_keluarga.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-warning btn-icon-text editData">Edit <i
                    class="bi bi-pencil-square"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.kartu-keluarga.kartuKeluarga',[
            'desa' => DesaModel::all()->where('defunct_ind', 'N')
        ]);
    }

    public function store(Request $request) {

        $kartuKeluarga = $request->id_kartu_keluarga;
        KartuKeluargaModel::updateOrCreate([
            'id_kartu_keluarga' => $kartuKeluarga
        ],
        [
            'no_kk' => $request->no_kk,
            'alamat_kk' => $request->alamat_kk,
            'rt_kk' => $request->rt_kk,
            'rw_kk' => $request->rw_kk,
            'kodepos_kk' => $request->kodepos_kk,
            'id_desa' => $request->id_desa,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($kartuKeluarga);
    }

    public function edit(Request $request)
    {
        $where = array('id_kartu_keluarga' => $request->id_kartu_keluarga);
        $kartuKeluarga  = KartuKeluargaModel::where($where)->first();
        return response()->json($kartuKeluarga);
        // $apotik = ApotikModel::find($id);
        // return response()->json($apotik);
    }
}
