<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdSubCatRequest;
use App\Http\Requests\UpdateProdSubCatRequest;
use App\Models\Config\ProdSubCat;

class ProdSubCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreProdSubCatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdSubCatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Config\ProdSubCat  $prodSubCat
     * @return \Illuminate\Http\Response
     */
    public function show(ProdSubCat $prodSubCat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Config\ProdSubCat  $prodSubCat
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdSubCat $prodSubCat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdSubCatRequest  $request
     * @param  \App\Models\Config\ProdSubCat  $prodSubCat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdSubCatRequest $request, ProdSubCat $prodSubCat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Config\ProdSubCat  $prodSubCat
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdSubCat $prodSubCat)
    {
        //
    }
}
