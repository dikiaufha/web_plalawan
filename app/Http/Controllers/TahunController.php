<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunModel;
use Alert;
use Yajra\DataTables\DataTables;

class TahunController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = TahunModel::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_tahun="'.$row->id_tahun.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-warning btn-icon-text editData">Edit <i
                    class="bi bi-pencil-square"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.tahun.tahun');
    }

    public function store(Request $request) {

        $tahun = $request->id_tahun;
        TahunModel::updateOrCreate([
            'id_tahun' => $tahun
        ],
        [
            'tahun' => $request->tahun,
        ]);
        return response()->json($tahun);
    }

    public function edit(Request $request)
    {
        $where = array('id_tahun' => $request->id_tahun);
        $tahun  = TahunModel::where($where)->first();
        return response()->json($tahun);
    }
}
