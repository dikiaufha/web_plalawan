<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KondisiAsetPertahunModel;
use App\Models\TahunModel;
use Alert;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class KondisiAsetPertahunController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = DB::table('kondisiaset_pertahun')
                    ->join('tahun', 'kondisiaset_pertahun.id_tahun', '=', 'tahun.id_tahun')
                    ->select('kondisiaset_pertahun.*', 'tahun.tahun')
                    ->latest()
                    ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_kondisiaset_pertahun="'.$row->id_kondisiaset_pertahun.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-warning btn-icon-text editData">Edit <i
                    class="bi bi-pencil-square"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.kondisiaset_pertahun.kondisiAsetPertahun',[
            'tahun' => TahunModel::all(),
        ]);
    }

    public function store(Request $request) {

        $kondisiAset = $request->id_kondisiaset_pertahun;
        KondisiAsetPertahunModel::updateOrCreate([
            'id_kondisiaset_pertahun' => $kondisiAset
        ],
        [
            'id_tahun' => $request->id_tahun,
            'baik' => $request->baik,
            'rusak_ringan' => $request->rusak_ringan,
            'rusak_berat' => $request->rusak_berat,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($kondisiAset);
    }

    public function edit(Request $request)
    {
        $where = array('id_kondisiaset_pertahun' => $request->id_kondisiaset_pertahun);
        $kondisiAset  = KondisiAsetPertahunModel::where($where)->first();
        return response()->json($kondisiAset);
    }
}
