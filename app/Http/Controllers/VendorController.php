<?php

namespace App\Http\Controllers;

use App\Models\vendor;
use App\Http\Requests\StorevendorRequest;
use App\Http\Requests\UpdatevendorRequest;

class VendorController extends Controller
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
     * @param  \App\Http\Requests\StorevendorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorevendorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatevendorRequest  $request
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatevendorRequest $request, vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(vendor $vendor)
    {
        //
    }
}
