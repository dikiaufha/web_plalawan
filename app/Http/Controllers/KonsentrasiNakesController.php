<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KonsentrasiNakesModel;
use Alert;
use Yajra\DataTables\DataTables;

class KonsentrasiNakesController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = KonsentrasiNakesModel::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_konsentrasi="'.$row->id_konsentrasi.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-warning btn-icon-text editData">Edit <i
                    class="bi bi-pencil-square"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.konsentrasi-nakes.konsentrasiNakes');
    }

    public function store(Request $request) {

        $konsentrasi = $request->id_konsentrasi;
        KonsentrasiNakesModel::updateOrCreate([
            'id_konsentrasi' => $konsentrasi
        ],
        [
            'nama_konsentrasi' => $request->nama_konsentrasi,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($konsentrasi);
    }

    public function edit(Request $request)
    {
        $where = array('id_konsentrasi' => $request->id_konsentrasi);
        $konsentrasi  = KonsentrasiNakesModel::where($where)->first();
        return response()->json($konsentrasi);
        // $apotik = ApotikModel::find($id);
        // return response()->json($apotik);
    }
}
