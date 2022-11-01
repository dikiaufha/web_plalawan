<?php

namespace App\Http\Controllers;

use App\Models\Datafaskes;
use Illuminate\Http\Request;

class DatafaskesController extends Controller
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
        $data['customers'] = Datafaskes::where('customer_name', 'like', '%' . $data['q'] . '%')->get();
        return view('datafaskes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add Customer';
        return view('datafaskes.create', $data);
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
     * @param  \App\Models\Datafaskes  $datafaskes
     * @return \Illuminate\Http\Response
     */
    public function show(Datafaskes $datafaskes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datafaskes  $datafaskes
     * @return \Illuminate\Http\Response
     */
    public function edit(Datafaskes $datafaskes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datafaskes  $datafaskes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datafaskes $datafaskes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datafaskes  $datafaskes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datafaskes $datafaskes)
    {
        //
    }
}
