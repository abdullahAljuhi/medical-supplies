<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use App\Http\Requests\StoreGovernorateRequest;
use App\Http\Requests\UpdateGovernorateRequest;

class GovernorateController extends Controller
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
     * @param  \App\Http\Requests\StoreGovernorateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGovernorateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function show(Governorate $governorate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function edit(Governorate $governorate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGovernorateRequest  $request
     * @param  \App\Models\Governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGovernorateRequest $request, Governorate $governorate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Governorate $governorate)
    {
        //
    }
}
