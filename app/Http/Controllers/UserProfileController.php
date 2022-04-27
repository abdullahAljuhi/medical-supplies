<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\Helper;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserProfileRequest;

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
        $user = User::with('profile')->find(Auth::id());
        if (Auth::user()->type === 0)
        {

            return view('user.user-profile', compact('user'));
        }

        return view('admin.user-profile', compact('user'));
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
    public function show($id)
    {
        $user = User::with('profile')->find($id);

        return view('user.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {


        $user = User::with('profile')->find(Auth::user()->id);

        $address=explode(',,',$user->profile['address']);
        $user->profile['address']=$address;
        // $governorate=$address[0];
        // $city=$address[1];
        // $address=[2];
        return view('user.user-profile', compact('user'));
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
            $user = UserProfile::find(Auth::user()->id);
            $photo= $user->image;
            $fileName = $photo;
            if ($request->has('image')) {

                if($fileName != null)
                Storage::disk('pharmacy')->delete($fileName);

                // save img in public/pharmacy/images
                $fileName = $this->uploadImage('pharmacy', $request->image);
            }

            $user=User::updated($request->all());
            $user->profile()->update($request->all());

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
