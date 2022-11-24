<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisOrganisasiModel;
use DataTables;
use Alert;

class JenisOrganisasiController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = JenisOrganisasiModel::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_jenis="'.$row->id_jenis.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-gradient-info btn-icon-text editData">Edit <i
                    class="mdi mdi-file-check btn-icon-append"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.jenis-organisasi.jenisOrganisasi');
    }

    public function store(Request $request) {

        $jenis = $request->id_jenis;
        JenisOrganisasiModel::updateOrCreate([
            'id_jenis' => $jenis
        ],
        [
            'jenis_organisasi' => $request->jenis_organisasi,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($jenis);
    }

    public function edit(Request $request)
    {
        $where = array('id_jenis' => $request->id_jenis);
        $jenis  = JenisOrganisasiModel::where($where)->first();
        return response()->json($jenis);
        // $apotik = ApotikModel::find($id);
        // return response()->json($apotik);
    }
}
