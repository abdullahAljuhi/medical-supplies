<?php

namespace App\Http\Controllers;
use App\Models\Advertisement;
use App\Helpers\Helper;

use App\Http\Requests\AdvertisementRequest;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{

    use Helper;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $advertisements= Advertisement::all();
            // if(empty($adv))
            // {
            //     return redirect()->route('adv.add');
            // }else{
            //     //if()
            // }
            // return $advertisements;
            return view('adv.ads',['advertisements'=>$advertisements]);

        } catch (\Throwable $th) {
            //throw $th;
        }



        // if ($advertisement->is_active == '1') {
        //     return view('adv.ads');
        // } else {
        //     return view('auth.verifyAdvertisement');

        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adv.addAds');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdvertisementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // return $request;
            // start transaction
            $fileName = '';
            if ($request->has('image')) {
                if($fileName != null){
                    $fileName=public_path('assets/images/advs/'.$fileName);
                    unlink(realpath($fileName));
                }
                // save img in public/adv/images
                $fileName = $this->uploadImage('advs',$request->image);
            }
            // create advertisement
        $advertisement = Advertisement::create([
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'image' => $fileName,
            'link' => $request['link'],
        ]);
            $advertisement->save();
           // return redirect()->route('home');
        } catch (\Exception $ex) {
            return $ex->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        //return view('advertisement')->withAdvertisement($advertisement);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $advertisements =Advertisement::find($id);
            return view('student.edit', compact('advertisements'));

        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdvertisementRequest  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $advertisement= Advertisement::findOrFail($id);
        try {

            $photo= $advertisement->image;

            $fileName = $photo;

            if ($request->has('image')) {
                if($fileName != null){
                    $fileName=public_path('assets/images/advs/'.$photo);
                    unlink(realpath($fileName));
                }

                // save img in public/adv/images
                $fileName = $this->uploadImage('advs', $request->image);
            }

            // $input = $request->all();
            // $advertisement->fill($input)->save();

            $advertisement->update([
                'link'=>$request->link,
                'image'=>$fileName,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
            ]);

            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $e) {

            return redirect()->back()->with(['error' => 'هناك خطا ما يرجي المحاولة فيما بعد']);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        //
    }

    // active advertisement
    public function active(Advertisement $advertisement)
    {
        $advertisement->is_active = 1;
        $advertisement->save();


        return redirect()->back();
    }

    // dis_active advertisement
    public function disActive(Advertisement $advertisement)
    {
        $advertisement->is_active = 0;
        $advertisement->save();
        return redirect()->back();
    }
}
