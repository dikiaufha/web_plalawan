<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KecamatanModel;
use DataTables;
use Alert;

class KecamatanController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = KecamatanModel::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_kec="'.$row->id_kec.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-warning btn-icon-text editData">Edit <i
                    class="bi bi-pencil-square"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.kecamatan.kecamatan');
    }

    public function store(Request $request) {

        $kecamatan = $request->id_kec;
        KecamatanModel::updateOrCreate([
            'id_kec' => $kecamatan
        ],
        [
            'nama_kecamatan' => $request->nama_kecamatan,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($kecamatan);
    }

    public function edit(Request $request)
    {
        $where = array('id_kec' => $request->id_kec);
        $kecamatan  = KecamatanModel::where($where)->first();
        return response()->json($kecamatan);
        // $apotik = ApotikModel::find($id);
        // return response()->json($apotik);
    }
}
