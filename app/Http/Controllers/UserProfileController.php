<?php

namespace App\Http\Controllers;

use App\Models\User_profile;
use App\Http\Requests\StoreUser_profileRequest;
use App\Http\Requests\UpdateUser_profileRequest;

class UserProfileController extends Controller
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
     * @param  \App\Http\Requests\StoreUser_profileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser_profileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_profile  $user_profile
     * @return \Illuminate\Http\Response
     */
    public function show(User_profile $user_profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_profile  $user_profile
     * @return \Illuminate\Http\Response
     */
    public function edit(User_profile $user_profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser_profileRequest  $request
     * @param  \App\Models\User_profile  $user_profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser_profileRequest $request, User_profile $user_profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_profile  $user_profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_profile $user_profile)
    {
        //
    }
}
