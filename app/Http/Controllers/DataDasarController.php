<?php

namespace App\Http\Controllers;

use App\Models\ApotikModel;

use Illuminate\Http\Request;

class DataDasarController extends Controller
{
    public function apotikPage(Request $request) {
        $data = ApotikModel::all()->where('defunct_ind', 'N');
        return view('datadasar', compact('data'));
    }
}
