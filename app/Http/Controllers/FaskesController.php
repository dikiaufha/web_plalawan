<?php

namespace App\Http\Controllers;

use App\Models\FaskesModel;
use DataTables;
use Alert;
use Illuminate\Http\Request;

class FaskesController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = FaskesModel::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-gradient-info btn-icon-text editData">Edit <i
                    class="mdi mdi-file-check btn-icon-append"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.datadasar.faskes.faskes');
    }

    public function store(Request $request) {

        $faskes = $request->id;
        FaskesModel::updateOrCreate([
            'id' => $faskes
        ],
        [
            'name_faskes' => $request->name_faskes,
            'alamat_faskes' => $request->alamat_faskes,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($faskes);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $faskes  = FaskesModel::where($where)->first();
        return response()->json($faskes);
        // $apotik = ApotikModel::find($id);
        // return response()->json($apotik);
    }
}
