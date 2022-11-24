<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DesaModel;
use App\Models\KecamatanModel;
use DataTables;
use Alert;
use Illuminate\Support\Facades\DB;

class DesaController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = DB::table('desa')
                    ->join('kecamatan', 'desa.id_kec', '=', 'kecamatan.id_kec')
                    ->select('desa.*', 'kecamatan.nama_kecamatan')
                    ->latest()
                    ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_desa="'.$row->id_desa.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-gradient-info btn-icon-text editData">Edit <i
                    class="mdi mdi-file-check btn-icon-append"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.desa.desa',[
            'kecamatan' => KecamatanModel::all()->where('defunct_ind', 'N')
        ]);
    }

    public function store(Request $request) {

        $desa = $request->id_desa;
        DesaModel::updateOrCreate([
            'id_desa' => $desa
        ],
        [
            'nama_desa' => $request->nama_desa,
            'id_kec' => $request->id_kec,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($desa);
    }

    public function edit(Request $request)
    {
        $where = array('id_desa' => $request->id_desa);
        $desa  = DesaModel::where($where)->first();
        return response()->json($desa);
        // $apotik = ApotikModel::find($id);
        // return response()->json($apotik);
    }
}
