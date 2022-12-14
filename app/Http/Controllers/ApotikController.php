<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApotikModel;
use Alert;
use Yajra\DataTables\DataTables;

class ApotikController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = ApotikModel::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-warning btn-icon-text editData">Edit <i
                    class="bi bi-pencil-square"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.datadasar.apotik.apotik');
    }

    public function store(Request $request) {

        $apotik = $request->id;
        ApotikModel::updateOrCreate([
            'id' => $apotik
        ],
        [
            'name_apotik' => $request->name_apotik,
            'alamat_apotik' => $request->alamat_apotik,
            'bidang_usaha' => $request->bidang_usaha,
            'apoteker' => $request->apoteker,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($apotik);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $apotik  = ApotikModel::where($where)->first();
        return response()->json($apotik);
        // $apotik = ApotikModel::find($id);
        // return response()->json($apotik);
    }
}
