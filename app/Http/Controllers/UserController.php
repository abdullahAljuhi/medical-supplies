<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function changePassword(UserRequest $request) {
        if (!(Hash::check($request->current_password, Auth::user()->password))) {

            // The passwords matches
            return redirect()->back()->with(["error"=>" كلمة المرور لا تتطابق مع كلمة المروو الخاصه بك"]);
        }

        if(strcmp($request->current_password , $request->new_password) == 0){

            // Current password and new password same
            return redirect()->back()->with(["error"=>" كلمة المرور الجديده لا يمكن تساوي   كلمة الحاليه"]);
        }

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with(["error"=>" تم تغيير كلمة السر بنجاح"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            if ($user->image !== '') { // check if user has image
                // remove image
                // Storage::disk('users')->delete($user->image);
                $fileName=public_path('assets/images/users/'.$user->image);
                unlink(realpath($fileName));
            }

            $user->delete();
            return redirect()->route('user.home');
        } catch (\Exception $e) {
            //throw $th;
        }
    }

    // get all orders for user auth
    public function orders()
    {
        $type = [['جديد','قيد الانتظار','مكتمل','غير متوفر','مرفوض','مسترجع'],['primary','warning','success','secondary','danger','orange']];
        $route = 'user.order';
        try {
             // if user is normal user
                $orders = Order::where('user_id',Auth::id())->get();
                return view('order.index', compact('orders','route','type'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function order($id)
    {
        try {
            $order = Order::find($id);
            if ($order) {
                $products = json_decode($order->products, JSON_UNESCAPED_UNICODE);
                if ($order->status == 0) {
                    return redirect()->back();
                } else {
                    return view('order.bill-text', compact('order', 'products'));
                }
            } else {
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
