<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\User_profile;
use App\Http\Requests\StoreUser_profileRequest;
use App\Http\Requests\UpdateUser_profileRequest;
=======
use App\Models\UserProfile;
use App\Http\Requests\UserProfileRequest;

>>>>>>> dev

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
<<<<<<< HEAD
     * @param  \App\Http\Requests\StoreUser_profileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser_profileRequest $request)
=======
     * @param  \App\Http\Requests\StoreUserProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserProfileRequest $request)
>>>>>>> dev
    {
        //
    }

    /**
     * Display the specified resource.
     *
<<<<<<< HEAD
     * @param  \App\Models\User_profile  $user_profile
     * @return \Illuminate\Http\Response
     */
    public function show(User_profile $user_profile)
    {
        //
=======
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show(UserProfile $userProfile)
    {
        
            return view('profiles.show', compact('userProfile'));
    
>>>>>>> dev
    }

    /**
     * Show the form for editing the specified resource.
     *
<<<<<<< HEAD
     * @param  \App\Models\User_profile  $user_profile
     * @return \Illuminate\Http\Response
     */
    public function edit(User_profile $user_profile)
    {
        //
=======
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProfile $userProfile)
    {
        return view('profiles.edit', compact('userProfile'));
>>>>>>> dev
    }

    /**
     * Update the specified resource in storage.
     *
<<<<<<< HEAD
     * @param  \App\Http\Requests\UpdateUser_profileRequest  $request
     * @param  \App\Models\User_profile  $user_profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser_profileRequest $request, User_profile $user_profile)
    {
        //
    }
=======
     * @param  \App\Http\Requests\UpdateUserProfileRequest  $request
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UserProfileRequest $request)
    {
        try{

            $userProfile = UserProfile::find(auth('web')->user()->id);

        if ($request->filled('password')) {
            $request->merge(['password' => bcrypt($request->password)]);
        }
        unset($request['id']);
        unset($request['password_confirmation']);

        $userProfile->update($request->all());
        return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

    }catch(\Exception $e){

    return redirect()->back()->with(['error' => 'هناك خطا ما يرجي المحاولة فيما بعد']);

    }  
  }
>>>>>>> dev

    /**
     * Remove the specified resource from storage.
     *
<<<<<<< HEAD
     * @param  \App\Models\User_profile  $user_profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_profile $user_profile)
=======
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProfile $userProfile)
>>>>>>> dev
    {
        //
    }
}
