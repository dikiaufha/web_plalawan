<?php

namespace App\Http\Controllers;

use App\Models\KecamatanExcelModel;
use Illuminate\Http\Request;
use App\Models\KecamatanModel;
use Alert;
use Yajra\DataTables\DataTables;

class KecamatanController extends Controller
{
    public function index(Request $request) {

        $data_excel = KecamatanExcelModel::all();
        if ($request->ajax()) {

            $data = KecamatanModel::latest()->get();

            return DataTables::of($data)
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
        return view('dashboard.components.kecamatan.kecamatan', compact('data_excel'));
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
