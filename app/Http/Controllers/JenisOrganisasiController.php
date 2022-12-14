<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisOrganisasiModel;
use Alert;
use Yajra\DataTables\DataTables;

class JenisOrganisasiController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = JenisOrganisasiModel::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_jenis="'.$row->id_jenis.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-warning btn-icon-text editData">Edit <i
                    class="bi bi-pencil-square"></i></a>';

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
            'nama_organisasi' => $request->nama_organisasi,
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
