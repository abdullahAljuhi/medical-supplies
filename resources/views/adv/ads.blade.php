@extends( 'layouts.app')
@section('title', 'ادارة الاعلانات')
@section('content')

    @include('alerts.errors')
    @include('alerts.success')

    <!-- Display Error
@if($errors->any())
        {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
    @endif -->



    <!-- Page Title -->
    <div class="pagetitle">
        <h1>ادارة الاعلانات</h1>
        <nav>
            <ol class="breadcrumb">
{{--                <li class="breadcrumb-item"><a href="../index.blade.php">الرئيسية</a></li>--}}
{{--                <li class="breadcrumb-item active">الاعلانات</li>--}}
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section profile min-vh-100 overflow-hidden">
        <div class="row">
            <div class="col-md-1 col-sm-2 links  ">
                <ul class="w-100 h-100 p-0" style="justify-content: space-between">
                    <li data-view="list-view" class="li-list active">
                        <i class="fas fa-th-list"></i>
                    </li>
                    <li data-view="grid-view" class="li-grid">
                        <i class="fas fa-th-large"></i>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 col-sm-12 mb-2">
                <div class="input-group  form-control ">
                    <input type="text" class=" border-0" style="width: 95%;outline:0ch" placeholder="البحث "
                           aria-label="Example text with button addon" aria-describedby="button-addon1">
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
                    <div class="row  py-2 border-bottom text-content text-black d-none-sm">
                        <div
                            class="col-md-1 col-4 mb-md-0 mb-4 d-flex justify-content-center fw-bold align-self-center fs-">
                            الرقم
                        </div>
                        <div class="col-md-2 col-8  fw-bold ">
                            الرابط
                        </div>
                        <div class="col-md-4  mb-2 mb-md-0   d-flex justify-content-strat  align-self-center">
                            <div class="row w-100">
                                <div class="col-6 fw-bold">
                                    <span>تاريخ البدء</span>
                                </div>
                                <div class="col-6 fw-bold">
                                    <span>تاريخ الانتهاء</span>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3 mb-2 mb-md-0 d-flex justify-content-strat fw-bold align-self-center">
                            <span> الحالة</span>
                        </div>
                        <div
                            class="col-md-2 mb-2 mb-md-0 text-center d-flex justify-content-center fw-bold align-self-center">
                            <span style="font-size: 18px">العمليات</span>
                        </div>
                    </div>
                    @foreach($advertisements as $ads)
                        <div class="mt-2 bg-white border-bottom py-2 row">
                            <a href="{{ route('edit.adv', $ads->id) }}"
                               class="row col-md-10    text-content text-black ">
                                <div
                                    class="col-md-1 col-4 mb-md-0 mb-4 d-flex justify-content-center  align-self-center fs-5">
                                    {{ $ads->id}}
                                </div>
                                <div
                                    class="col-md-3 col-8  d-flex justify-content-strat  align-self-center overflow-hidden">
                                    {{ $ads->link}}
                                </div>
                                <div class="col-md-5  mb-2 mb-md-0   d-flex justify-content-strat  align-self-center">
                                    <div class="row w-100">
                                        <div class="col-6">
                                            <span>{{ $ads->start_date}}</span>
                                        </div>
                                        <div class="col-6">
                                            <span> {{ $ads->end_date}}</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-3 mb-2 mb-md-0 d-flex justify-content-strat  align-self-center">
                                    @if( $ads->is_active)
                                        <span class="badge text-primary fs-6">
                                    نشط
                                </span>
                                    @else
                                        <span class="badge text-danger fs-6">
                                غير مفعل
                                </span>
                                    @endif
                                </div>
                                <div class="col-md-2 mb-2 mb-md-0  text-center row">
                                    <div class=" col-9 text-center">
                                        <!--<div class="col-10 border">-->


                                        @if( $ads->is_active)
                                            <a href="{{ route('active.adv', $ads->id) }}"
                                               class="btn btn-outline-danger   w-100 ">
                                                ايقاف
                                            </a>
                                        @else
                                            <a href="{{ route('active.adv', $ads->id) }}"
                                               class="btn btn-outline-primary   ">

                                                تفعيل
                                            </a>
                                        @endif


                                    </div>

                                    <div class=" col-3 text-center">
                                        <a href="{{ route('delete.adv', $ads->id) }}" class="btn btn-outline-danger  ">
                                            حذف
                                        </a>
                                    </div>
                                    <!--</div>-->

                                </div>
                            </a>
                        </div>
                    @endforeach
                    @if(count($advertisements) == 0)
                        <div class="text-center my-3">
                            <span class="fs-5">{{ __('لا يوجد اي اعلانات') }}</span>
                        </div>
                    @endif

                </div>

                <div class="view_wrap grid-view " style="display: none;">

                    <div class="card-group row  text-center jobs">
                        @foreach($advertisements as $ads)
                            <div class="col-md-4 col-sm-12">
                                <div class="card w-100 p-2">
                                    <img src="{{asset('assets/images/advs/'.$ads->image) }}"
                                         class="card-img-top py-5 img-card-cus" alt="...">
                                    <div class="card-body pb-0">
                                        <p class="card-text fs-5 text-secondary text-center w-100 pt-2">
                                            <span class="text-primary ps-2"> الحالة</span>
                                            @if( $ads->is_active)
                                                <span class="badge bg-primary fs-6">
                                  نشط
                               </span>
                                            @else
                                                <span class="badge bg-danger fs-6">
                                 غير مفعل
                               </span>
                                            @endif
                                        </p>

                                    </div>
                                    <div class="card-footer bg-white border-0">
                                        <div class="my-2">
                                            @if( $ads->is_active)
                                                <a href="{{ route('active.adv', $ads->id) }}"
                                                   class="btn btn-outline-danger   w-100 ">
                                                    إلغاء التفعيل
                                                </a>
                                            @else
                                                <a href="{{ route('active.adv', $ads->id) }}"
                                                   class="btn btn-outline-primary   w-100 ">

                                                    تفعيل
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if(count($advertisements) == 0)
                            <div class="text-center my-3">
                                <span class="fs-5">{{ __('لا يوجد اي اعلانات') }}</span>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
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
