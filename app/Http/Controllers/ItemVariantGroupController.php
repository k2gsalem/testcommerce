<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemVariantGroupRequest;
use App\Http\Requests\UpdateItemVariantGroupRequest;
use App\Models\Catalogue\ItemVariantGroup;

class ItemVariantGroupController extends Controller
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
     * @param  \App\Http\Requests\StoreItemVariantGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemVariantGroupRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalogue\ItemVariantGroup  $itemVariantGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ItemVariantGroup $itemVariantGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalogue\ItemVariantGroup  $itemVariantGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemVariantGroup $itemVariantGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemVariantGroupRequest  $request
     * @param  \App\Models\Catalogue\ItemVariantGroup  $itemVariantGroup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemVariantGroupRequest $request, ItemVariantGroup $itemVariantGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalogue\ItemVariantGroup  $itemVariantGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemVariantGroup $itemVariantGroup)
    {
        //
    }
}
