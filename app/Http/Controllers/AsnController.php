<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AsnModel;
use App\Models\BidangIlmuModel;
use App\Models\OrganisasiModel;
use DataTables;
use Alert;
use Illuminate\Support\Facades\DB;

class AsnController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = DB::table('asn')
            ->join('bidang_ilmu', 'asn.id_bidang_ilmu', '=', 'bidang_ilmu.id_bidang_ilmu')
            ->join('organisasi', 'asn.id_organisasi', '=', 'organisasi.id_organisasi')
            ->select('asn.*', 'bidang_ilmu.bidang_ilmu', 'organisasi.name_organisasi')
            ->latest()
            ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_asn="'.$row->id_asn.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-warning btn-icon-text editData">Edit <i
                    class="bi bi-pencil-square"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.asn.asn', [
            'bidangIlmu' => BidangIlmuModel::all()->where('defunct_ind', 'N'),
            'organisasi' => OrganisasiModel::all()->where('defunct_ind', 'N'),
        ]);
    }

    public function store(Request $request) {

        $asn = $request->id_asn;
        AsnModel::updateOrCreate([
            'id_asn' => $asn
        ],
        [
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'id_bidang_ilmu' => $request->id_bidang_ilmu,
            'id_organisasi' => $request->id_organisasi,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($asn);
    }

    public function edit(Request $request)
    {
        $where = array('id_asn' => $request->id_asn);
        $asn  = AsnModel::where($where)->first();
        return response()->json($asn);
    }
}
