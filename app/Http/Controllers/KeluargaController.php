<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeluargaModel;
use App\Models\StatusKawinModel;
use App\Models\AgamaModel;
use App\Models\StatusKeluargaModel;
use Alert;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class KeluargaController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = DB::table('keluarga')
            ->join('status_kawin', 'keluarga.id_status_kawin', '=', 'status_kawin.id_status_kawin')
            ->join('agama', 'keluarga.id_agama', '=', 'agama.id_agama')
            ->join('status_dalamkeluarga', 'keluarga.id_status_dalamkeluarga', '=', 'status_dalamkeluarga.id_status_dalamkeluarga')
            ->select('keluarga.*', 'status_kawin.status_kawin', 'agama.agama',  'status_dalamkeluarga.status_dalamkeluarga')
            ->latest()
            ->get();


            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_keluarga="'.$row->id_keluarga.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-warning btn-icon-text editData">Edit <i
                    class="bi bi-pencil-square"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.keluarga.keluarga', [
            'status_kawin' => StatusKawinModel::all()->where('defunct_ind', 'N'),
            'agama' => AgamaModel::all()->where('defunct_ind', 'N'),
            'status_dalamkeluarga' => StatusKeluargaModel::all()->where('defunct_ind', 'N')
        ]);
    }

    public function store(Request $request) {

        $keluarga = $request->id_keluarga;
        KeluargaModel::updateOrCreate([
            'id_keluarga' => $keluarga
        ],
        [
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'id_status_kawin' => $request->id_status_kawin,
            'id_agama' => $request->id_agama,
            'id_status_dalamkeluarga' => $request->id_status_dalamkeluarga,
            'status_jamkesda' => $request->status_jamkesda,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($keluarga);
    }

    public function edit(Request $request)
    {
        $where = array('id_keluarga' => $request->id_keluarga);
        $keluarga  = KeluargaModel::where($where)->first();
        return response()->json($keluarga);
    }
}
