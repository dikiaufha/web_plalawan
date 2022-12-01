<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusKeluargaModel;
use DataTables;
use Alert;

class StatusKeluargaController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = StatusKeluargaModel::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_status_dalamkeluarga="'.$row->id_status_dalamkeluarga.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-gradient-info btn-icon-text editData">Edit <i
                    class="mdi mdi-file-check btn-icon-append"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.status-keluarga.statusKeluarga');
    }

    public function store(Request $request) {

        $statusKeluarga = $request->id_status_dalamkeluarga;
        StatusKeluargaModel::updateOrCreate([
            'id_status_dalamkeluarga' => $statusKeluarga
        ],
        [
            'status_dalamkeluarga' => $request->status_dalamkeluarga,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($statusKeluarga);
    }

    public function edit(Request $request)
    {
        $where = array('id_status_dalamkeluarga' => $request->id_status_dalamkeluarga);
        $statusKeluarga  = StatusKeluargaModel::where($where)->first();
        return response()->json($statusKeluarga);
    }
}
