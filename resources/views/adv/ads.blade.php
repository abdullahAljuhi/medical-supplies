@extends( 'layouts.app')
@section('title', 'ادارة الاعلانات')
@section('content')
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>ادارة الاعلانات</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.blade.php">الرائيسية</a></li>
                <li class="breadcrumb-item active">الاعلانات</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section profile min-vh-100 overflow-hidden">
        <div class="row">
            <div class="col-md-1 col-sm-2 links  " >
                <ul class="w-100 h-100 p-0" style="justify-content: space-between">
                    <li data-view="list-view" class="li-list active">
                    <i class="fas fa-th-list"></i>
                    </li>
                    <li data-view="grid-view" class="li-grid">
                    <i class="fas fa-th-large" ></i>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 col-sm-12 mb-2">
                <div class="input-group  form-control ">
                    <input type="text" class=" border-0" style="width: 95%;outline:0ch" placeholder="البحث " aria-label="Example text with button addon" aria-describedby="button-addon1">
                    <i class="bi bi-search" style="width: 5%"></i>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                        <a href="{{ route('add.adv') }}" class="btn btn-primary px-4 shadow w-100">
                            اضافة اعلان جديد
                    </a>
            </div>
        </div>
        <div class="wrapper">
            <div class="view_main container shadow ">
                <div class="view_wrap list-view" style="display: block;">
                    <div   class="row  py-2 border-bottom text-content text-black d-none-sm">
                        <div class="col-md-1 col-4 mb-md-0 mb-4 d-flex justify-content-center fw-bold align-self-center fs-">الرقم
                        </div>
                        <div class="col-md-2 col-8  fw-bold ">
                         الربط
                        </div>
                        <div class="col-md-4  mb-2 mb-md-0   d-flex justify-content-strat  align-self-center">
                            <div class="row w-100">
                                <div class="col-6 fw-bold">
                                    <span >تاريخ البد</span>
                                </div>
                                <div class="col-6 fw-bold">
                                    <span >تاريخ الانتهاء</span>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3 mb-2 mb-md-0 d-flex justify-content-strat fw-bold align-self-center">
                            <span > الحالة</span>
                        </div>
                        <div class="col-md-2 mb-2 mb-md-0 text-center d-flex justify-content-center fw-bold align-self-center">
                            <span style="font-size: 18px">العمليات</span>
                        </div>
                    </div>
                    @foreach($advertisements as $ads)
                    <div class="mt-2 bg-white ">
                        <a href="{{ route('edit.adv', $ads->id) }}" class="row  py-2 border-bottom text-content text-black ">
                            <div class="col-md-1 col-4 mb-md-0 mb-4 d-flex justify-content-center  align-self-center fs-5">
                                {{ $ads->id}}
                            </div>
                            <div class="col-md-2 col-8  d-flex justify-content-strat  align-self-center overflow-hidden">
                                {{ $ads->link}}
                            </div>
                            <div class="col-md-4  mb-2 mb-md-0   d-flex justify-content-strat  align-self-center">
                                <div class="row w-100">
                                    <div class="col-6">
                                        <span >{{ $ads->start_date}}</span>
                                    </div>
                                    <div class="col-6">
                                        <span > {{ $ads->end_date}}</span>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-2 mb-2 mb-md-0 d-flex justify-content-strat  align-self-center">
                                @if( $ads->is_active)
                                    <span class="badge bg-success fs-6">
                                    نشط
                                </span>
                                @else
                                    <span class="badge bg-danger fs-6">
                                غير مفعل
                                </span>
                                @endif
                            </div>
                            <div class="col-md-3 mb-2 mb-md-0 text-center d-flex justify-content-center fw-bold align-self-center">
                              <div class="row">
                               <div class="col-12">
                               <a href="{{ route('active.adv', $ads->id) }}" class="btn btn-outline-primary  d-flex justify-content-center align-self-center">
                                   <button type="button" class="btn btn-outline-primary px-4">
                                        @if( $ads->is_active)
                                            <span style="font-size: 14px" >
                                             إلغاء التفعيل
                                           </span>
                                        @else
                                            <span style="font-size: 14px">
                                               تفعيل
                                            </span>
                                        @endif
                                    
                                    </button>
                               </a>
                               </div>

                              </div>

                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>

                <div class="view_wrap grid-view " style="display: none;">

<<<<<<< HEAD
@foreach($advertisements as $ads)
    <div class="card-group p-lg-5 row  text-center jobs">

            <div class="col-md-4 col-sm-12">
                <div class="card w-100 p-2">
                    <img src="{{asset('assets/images/advs/'.$ads->image) }}" class="card-img-top py-5 img-card-cus" alt="...">
                    <div class="card-body pb-0">
                        <p class="card-text fs-5 text-secondary text-center w-100">
                            <span class="text-primary ps-2"> الحالة</span>
                            @if( $ads->is_active)
                               <span class="badge bg-success fs-6">
                                  نشط
                               </span>
                            @else
                               <span class="badge bg-danger fs-6">
                                 غير مفعل
                               </span>
                            @endif
                        </p>

                    </div>
                    <div class="card-footer bg-white border-0" >
                        <div class="my-2">
                            <a href="{{ route('active.adv', $ads->id) }}" class="btn btn-outline-primary w-100">
                              @if( $ads->is_active)
                                 <span >
                                     إلغاء التفعيل
                                  </span>
                                @else
                                  <span >
                                    تفعيل
                                   </span>
                                @endif 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endforeach
</div>
            </div>
=======
                    <div class="card-group p-lg-5 row  text-center jobs">

                            <div class="col-md-4 col-sm-12">
                                <div class="card w-100 p-2">
                                    <img src="{{asset('assets/images/advs/'.$ads->image) }}" class="card-img-top py-5 img-card-cus" alt="...">
                                    <div class="card-body pb-0">
                                         <p class="card-text fs-5 text-secondary text-center w-100">
                                            <span class="text-primary ps-2"> الحالة</span>
                                            <span>مفعل</span>
                                         </p>

                                    </div>
                                    <div class="card-footer bg-white border-0" >
                                        <div class="my-2">
                                            <a href="job-details.html" class="btn btn-outline-primary w-100">
                                               الغاء التفعيل
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
>>>>>>> b042d9b680f4cd80cfa0fe41e46d74b7b77938ba
        </div>
    </section>

    <script>
        imgInp = document.getElementById('imgInp');
        blah = document.getElementById('blah');

        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
