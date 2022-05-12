@extends('layouts.app')
@section('title', 'طلب جديد')
@section('content')
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>كشف عرض الاسعار</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">لوحة التحكم</a></li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-title">
                        <div class="row mb-2">
                            <div class="col-md-4 col-sm-12 mb-2">
                                <p class="fs-5 py-0 my-0  mx-3">رقم الطلب :
                                     777777
                                </p>
                            </div> 
                            <div class="col-md-8 col-sm-12 mb-2" >
                                <p class="fs-5 py-0 my-0  mx-3">  اسم المستخدم :
مراد حسن العمودي 
                                </p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 col-sm-12 mb-2">
                                <p class="fs-5 py-0 my-0  mx-3">    تاريخ الطلب :
                                    2020/20/20
                                </p>
                            </div>
                            <div class="col-md-8 col-sm-12 mb-2">
                                <p class="fs-5 py-0 my-0  mx-3">   عنوان التوصيل :
                                    حضرموت - المكلا -الشارع العام
                                </p>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <form method="post" action="">
                                @csrf
                                <div class="row mb-2">
                                    <div class="col-md-3 mb-2 border-1">
                                        <img class="img-fluid mb-2 w-100" src="{{asset('img/pro1.jpg ') }}" alt="" >
                                        <input type="text" name="products[]" class="form-control w-100" id="name" required placeholder=" ادخال سعر المنتج">
                                    </div>
                                    <div class="col-md-3 mb-2 border-1">
                                        <img class="img-fluid mb-2 w-100" src="{{asset('img/pro1.jpg ') }}" alt="" >
                                        <input type="text" name="products[]" class="form-control w-100" id="name" required placeholder=" ادخال سعر المنتج">
                                    </div>
                                    <div class="col-md-3 mb-2 border-1">
                                        <img class="img-fluid mb-2 w-100" src="{{asset('img/pro1.jpg ') }}" alt="" >
                                        <input type="text" name="products[]" class="form-control w-100" id="name" required placeholder=" ادخال سعر المنتج">
                                    </div>
                                    <div class="col-md-3 mb-2 border-1">
                                        <img class="img-fluid mb-2 w-100" src="{{asset('img/pro1.jpg ') }}" alt="" >
                                        <input type="text" name="products[]" class="form-control w-100" id="name" required placeholder=" ادخال سعر المنتج">
                                    </div>
                                     
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 mb-2 ">
                                        <label for="name" >سعر التوصيل</label>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <input type="text" name="delever" class="form-control w-100" id="name" required placeholder="يرجى ادخال سعر التوصيل ">
                                    </div>
                                </div>
                                <hr>
                                <div class="tab-pane fade show active profile-overview mt-3 row" id="profile-overview">
                                    <button type="submit" class="btn btn-primary px-3 col-md-2 col-sm-12 mb-2">ارسال</button>
                                    <a type="submit" class="btn btn-danger px-3 col-md-2 col-sm-12   mx-sm-2 mb-2">رفض الطلب</a>
                                </div>
                            </form>
                        </div>
                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
        </div>
    </section>
@endsection
