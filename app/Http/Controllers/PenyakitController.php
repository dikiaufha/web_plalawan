<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenyakitModel;
use Alert;
use Yajra\DataTables\DataTables;

class PenyakitController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = PenyakitModel::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_penyakit="'.$row->id_penyakit.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-warning btn-icon-text editData">Edit <i
                    class="bi bi-pencil-square"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.penyakit.penyakit');
    }

    public function store(Request $request) {

        $penyakit = $request->id_penyakit;
        PenyakitModel::updateOrCreate([
            'id_penyakit' => $penyakit
        ],
        [
            'nama_penyakit' => $request->nama_penyakit,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($penyakit);
    }

    public function edit(Request $request)
    {
        $where = array('id_penyakit' => $request->id_penyakit);
        $penyakit  = PenyakitModel::where($where)->first();
        return response()->json($penyakit);
        // $apotik = ApotikModel::find($id);
        // return response()->json($apotik);
    }
}
