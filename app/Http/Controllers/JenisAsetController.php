<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisAsetModel;
use App\Models\OrganisasiModel;
use Alert;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class JenisAsetController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = DB::table('jenis_aset')
                    ->join('organisasi', 'jenis_aset.id_organisasi', '=', 'organisasi.id_organisasi')
                    ->select('jenis_aset.*', 'organisasi.name_organisasi')
                    ->latest()
                    ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_jenis_aset="'.$row->id_jenis_aset.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-warning btn-icon-text editData">Edit <i
                    class="bi bi-pencil-square"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.jenis-aset.jenisAset',[
            'organisasi' => OrganisasiModel::all()->where('defunct_ind', 'N')
        ]);
    }

    public function store(Request $request) {

        $jenisAset = $request->id_jenis_aset;
        JenisAsetModel::updateOrCreate([
            'id_jenis_aset' => $jenisAset
        ],
        [
            'nama_aset' => $request->nama_aset,
            'id_organisasi' => $request->id_organisasi,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($jenisAset);
    }

    public function edit(Request $request)
    {
        $where = array('id_jenis_aset' => $request->id_jenis_aset);
        $jenisAset  = JenisAsetModel::where($where)->first();
        return response()->json($jenisAset);
    }
}
