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
            if(empty($advertisements))
            {
                return redirect()->route('adv.add');
            }else{
                return view('adv.ads')->with('advertisements',$advertisements);
            }
            

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        
        }
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

            
            
            // start transaction
            $fileName = "";
            if ($request->has('image')) {
                if($fileName != null){
                    $fileName=public_path('assets/images/advs/'.$fileName);
                    link(realpath($fileName));
                }
                
                // save img in public/adv/images
                $fileName = $this->uploadImage('advs',$request->image);
            }
            
            // create advertisement
        $advertisements = Advertisement::create([
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'image' => $fileName,
            'link' => $request['link'],
        ]);
            $advertisements->save();
            return redirect()->route('show.adv');
        
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
        $advertisements= Advertisement::findOrFail($id);
        try {

            $fileName = $advertisements->image;


            if ($request->has('image')) {
                if($fileName != null){
                    $fileName=public_path('assets/images/advs/'.$fileName);
                    unlink(realpath($fileName));
                }

                // save img in public/adv/images
                $fileName = $this->uploadImage('advs', $request->image);
            }

            // $input = $request->all();
            // $advertisement->fill($input)->save();

            $advertisements->update([
                'start_date' => $request['start_date'],
                'end_date' => $request['end_date'],
                'image' => $fileName,
                'link' => $request['link'],
            ]);

            return redirect()->route('show.adv');
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
    public function active($id )
     {
        
        $advertisements= Advertisement::findOrFail($id);
        $ac=$advertisements->is_active ;
          
         if($ac == 0)
         {
             $ac=1;
 
         }else{
             $ac=0;
         }
         
            $advertisements->is_active=$ac;
 
         
         $advertisements->save();
         return redirect()->back();
     }
}
