<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\Helper;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserProfileRequest;
use App\Http\Requests\UserRequest;

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

        if( $user->type == 2 ){
            return redirect()->route('pharmacy.edit');
        }
        return view('user.profile', compact('user'));
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


        $user = User::find(Auth::user()->id);
        if( $user->type == 2 ){
            return redirect()->route('pharmacy.edit');
        }


        return view('user.user-profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserProfileRequest  $request
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UserProfileRequest $request)
    {
        try {
            $user = User::with('profile')->find(Auth::user()->id);

            $photo= $user->profile['image'];

            $fileName = $photo;

            if ($request->has('image')) {
                if($fileName != null){
                    $fileName=public_path('assets/images/users/'.$photo);
                    unlink(realpath($fileName));
                }

                // save img in public/pharmacy/images
                $fileName = $this->uploadImage('users', $request->image);
            }

            $input = $request->all();
            $user->fill($input)->save();

            $user->profile()->update([
                'phone'=>$request->phone,
                'image'=>$fileName,
                'birthday'=>$request->birthday,
                'address'=>$request->address,
            ]);


            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $e) {
            return $e->getMessage();
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
