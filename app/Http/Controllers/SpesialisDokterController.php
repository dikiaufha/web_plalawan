<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpesialisDokterModel;
use DataTables;
use Alert;

class SpesialisDokterController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = SpesialisDokterModel::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_spesialis="'.$row->id_spesialis.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-gradient-info btn-icon-text editData">Edit <i
                    class="mdi mdi-file-check btn-icon-append"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.spesialis-dokter.spesialisDokter');
    }

    public function store(Request $request) {

        $spesialis = $request->id_spesialis;
        SpesialisDokterModel::updateOrCreate([
            'id_spesialis' => $spesialis
        ],
        [
            'nama' => $request->nama,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($spesialis);
    }

    public function edit(Request $request)
    {
        $where = array('id_spesialis' => $request->id_spesialis);
        $spesialis  = SpesialisDokterModel::where($where)->first();
        return response()->json($spesialis);
        // $apotik = ApotikModel::find($id);
        // return response()->json($apotik);
    }
}
