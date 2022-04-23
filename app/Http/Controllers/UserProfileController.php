<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\UserProfile;
use App\Http\Requests\UserProfileRequest;
use App\Models\City;
use App\Models\Governorate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    use Helper;
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
     * @param  \App\Http\Requests\StoreUserProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show(UserProfile $userProfile)
    {
        $user = User::find(Auth::id())->with('profile', 'addresses');

        return view('profiles.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $cities = City::all();

        $governorates = Governorate::all();

        $user = User::find(Auth::id())->with('profile', 'addresses');

        return view('auth.test.profile', compact('user', 'cities', 'governorates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserProfileRequest  $request
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UserProfileRequest $request)
    {
        try {

            // dd($request);

            $userProfile = UserProfile::find(auth('web')->user()->id);
            if ($request->filled('password')) {
                $request->merge(['password' => bcrypt($request->password)]);
            }
            $fileName = "";
            if ($request->has('img')) {

                $fileName = $this->uploadImage('users', $request->img);
            }

            $userProfile->update([
                'image' => $fileName,
                'phone' => $request->phone,
                'birthday' => $request->birthday,
            ]);
            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'هناك خطا ما يرجي المحاولة فيما بعد']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}
