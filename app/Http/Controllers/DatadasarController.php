<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApotikModel;

class DataDasarController extends Controller
{
    public function tablePage() {
        $data = ApotikModel::all()->where('defunct_ind', 'N');
        return view('datadasar', compact('data'));
    }
}
