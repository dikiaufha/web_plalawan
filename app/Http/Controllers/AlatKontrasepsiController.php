<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlatKontrasepsiModel;
use Alert;
use Yajra\DataTables\DataTables;

class AlatKontrasepsiController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = AlatKontrasepsiModel::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_kontrasepsi="'.$row->id_kontrasepsi.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-warning btn-icon-text editData">Edit <i
                    class="bi bi-pencil-square"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.alat-kontrasepsi.alatKontrasepsi');
    }

    public function store(Request $request) {

        $kontrasepsi = $request->id_kontrasepsi;
        AlatKontrasepsiModel::updateOrCreate([
            'id_kontrasepsi' => $kontrasepsi
        ],
        [
            'nama_kontrasepsi' => $request->nama_kontrasepsi,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($kontrasepsi);
    }

    public function edit(Request $request)
    {
        $where = array('id_kontrasepsi' => $request->id_kontrasepsi);
        $kontrasepsi  = AlatKontrasepsiModel::where($where)->first();
        return response()->json($kontrasepsi);
    }
}
