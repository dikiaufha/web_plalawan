<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BidangIlmuModel;
use Alert;
use Yajra\DataTables\DataTables;

class BidangIlmuController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = BidangIlmuModel::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_bidang_ilmu="'.$row->id_bidang_ilmu.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-warning btn-icon-text editData">Edit <i
                    class="bi bi-pencil-square"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.bidang-ilmu.bidangIlmu');
    }

    public function store(Request $request) {

        $ilmu = $request->id_bidang_ilmu;
        BidangIlmuModel::updateOrCreate([
            'id_bidang_ilmu' => $ilmu
        ],
        [
            'bidang_ilmu' => $request->bidang_ilmu,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($ilmu);
    }

    public function edit(Request $request)
    {
        $where = array('id_bidang_ilmu' => $request->id_bidang_ilmu);
        $ilmu  = BidangIlmuModel::where($where)->first();
        return response()->json($ilmu);
    }
}
