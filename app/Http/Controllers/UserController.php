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

    public function changePassword(Request $request) {
        if (!(Hash::check($request->current_password, Auth::user()->password))) {

            // The passwords matches
            return redirect()->back()->with(["error"=>" كلمة المرور لا تتطابق مع كلمة المروو الخاصه بك"]);
        }

        // Current password and new password same
        if(strcmp($request->current_password , $request->new_password) == 0){

            return redirect()->back()->with(["error"=>" كلمة المرور الجديده لا يمكن تساوي   كلمة الحاليه"]);
        }

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with(["sucess"=>" تم تغيير كلمة السر بنجاح"]);
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

        //this show order status to the user
        $type = [['قيد الانتظار','في انتظار الدفع','مكتمل','غير متوفر','مرفوض','مشكله في الدفع','مسترجع'],['primary','warning','success','secondary','danger','orange','orange']];
        
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

            if ($order) { //
            // check is if auth user can see this order

            if($order->user_id==Auth::id()){
                    $products = json_decode($order->products, JSON_UNESCAPED_UNICODE);
                    if ($order->status == 0) {
                        return redirect()->back();
                    } else {
                        $order->is_show=1;
                        $order->save();
                        return view('order.bill-text', compact('order', 'products'));
                    }
                } else {
                    return redirect()->back();
                }
            }
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
        
    }

    // show user order's
    public function OrderNotification(){

        $orders = Order::where('status',0)->where('user_id',Auth::id())->get();

        return $orders;

    }

    public function getWallet(){

        $user=User::find(Auth::id())->wallet;

        return $user->wallet;

    }
}
