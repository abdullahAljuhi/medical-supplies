<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Http\Requests\StoreAdvertisementRequest;
use App\Http\Requests\UpdateAdvertisementRequest;

class AdvertisementController extends Controller
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
        return view('advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdvertisementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdvertisementRequest $request)
    {
        $adv=new Advertisement();
        $adv->details=$request->details;
        $adv->startDate=$request->startDate;
        $adv->endDate=$request->endDate;
        $adv->price=$request->price;
        $adv->image=$request->hasFile('image')?$this->uploadFile($request->file('image')):""; 
        $adv->save();
    }

    public function uploadFile($file){
        $dest=public_path()."/images/";

        //$file = $request->file('image');
        $filename= time()."_".$file->getClientOriginalName();
        $file->move($dest,$filename);
        return $filename;


    }

    /**
     * Display the active advertisement
     */

    public function listAll(){

        $advs=Advertisement::where('is_active',1)->orderBy('advertisement_id','desc')->get();
       
        return view('list_advs')
        ->with('allAdvs',$advs);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        return view('advertisement.advertisement-info')->withAdvertisement($advertisement);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        try {
            if ($advertisement == '') {
                return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
            }
            return view('advertisement.edit')->withPharmacy($advertisement);
        } catch (\Exception $e) {
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
    public function update(UpdateAdvertisementRequest $request, Advertisement $advertisement)
    {
        //
        try {
            DB::beginTransaction();

            $fileName = $advertisement->image;

            if ($request->has('image')) {
                if($fileName != null){
                    $fileName=public_path('assets/images/advertisment/'.$fileName);
                    unlink(realpath($fileName));
                }

                // save img in public/advs/images
                $fileName = $this->uploadImage('advertisment', $request->image);

                $adv->update([
                    'image' => $fileName,
                    'details'=>$request['details'],
                    'startDate'=>$request['startDate'],
                    'endDate'=>$request['endDate']
                ]);
                $adv->save();
                return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
}
