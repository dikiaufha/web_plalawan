<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgamaModel;
use DataTables;
use Alert;

class AgamaController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = AgamaModel::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_agama="'.$row->id_agama.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-warning btn-icon-text editData">Edit <i
                    class="bi bi-pencil-square"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.agama.agama');
    }

    public function store(Request $request) {

        $agama = $request->id_agama;
        AgamaModel::updateOrCreate([
            'id_agama' => $agama
        ],
        [
            'agama' => $request->agama,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($agama);
    }

    public function edit(Request $request)
    {
        $where = array('id_agama' => $request->id_agama);
        $agama  = AgamaModel::where($where)->first();
        return response()->json($agama);
    }
}
