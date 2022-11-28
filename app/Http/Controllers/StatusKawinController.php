<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusKawinModel;
use DataTables;
use Alert;

class StatusKawinController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = StatusKawinModel::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_status_kawin="'.$row->id_status_kawin.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-gradient-info btn-icon-text editData">Edit <i
                    class="mdi mdi-file-check btn-icon-append"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.status-kawin.statusKawin');
    }

    public function store(Request $request) {

        $statusKawin = $request->id_status_kawin;
        StatusKawinModel::updateOrCreate([
            'id_status_kawin' => $statusKawin
        ],
        [
            'status_kawin' => $request->status_kawin,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($statusKawin);
    }

    public function edit(Request $request)
    {
        $where = array('id_status_kawin' => $request->id_status_kawin);
        $statusKawin  = StatusKawinModel::where($where)->first();
        return response()->json($statusKawin);
    }
}
