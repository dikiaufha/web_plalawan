<?php

namespace App\Http\Controllers;

use App\Models\Langgam;
use Illuminate\Http\Request;

class LanggamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Customers';
        $data['q'] = $request->get('q');
        $data['customers'] = Langgam::where('customer_name', 'like', '%' . $data['q'] . '%')->get();
        return view('langgam.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Langgam  $langgam
     * @return \Illuminate\Http\Response
     */
    public function show(Langgam $langgam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Langgam  $langgam
     * @return \Illuminate\Http\Response
     */
    public function edit(Langgam $langgam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Langgam  $langgam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Langgam $langgam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Langgam  $langgam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Langgam $langgam)
    {
        //
    }
}
