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
                                     {{ $order->id }}
                                </p>
                            </div> 
                            <div class="col-md-8 col-sm-12 mb-2" >
                                <p class="fs-5 py-0 my-0  mx-3">  اسم المستخدم :
                                    {{ $order->user['name'] }}
                                </p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 col-sm-12 mb-2">
                                <p class="fs-5 py-0 my-0  mx-3">    تاريخ الطلب :
                                    {{ $order->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <div class="col-md-8 col-sm-12 mb-2">
                                <p class="fs-5 py-0 my-0  mx-3">   عنوان التوصيل :
                                    {{ $order->address }}
                                </p>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <form method="post" action="{{ route('order.store',$order->id ) }}">
                                @csrf
                                @foreach ($products as $product)
                                <div class="row mb-2">
                                    <div class="col-md-2 col-sm-12 mb-2 border-1">
                                        @if($order->type == 1)
                                            <img src="{{asset('assets/images/orders/'.$product['product_name'])}}" alt="" srcset="">
                                        @else
                                        <label for="name" >{{ $product['product_name'] }} </label>
                                        @endif
                                        
                                        <label for="name" >{{ $product['quantity'] }} </label>
                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                        <input type="text" name="prices[]" class="form-control col-6" id="name" required placeholder="يرجى ادخال سعر هذا المنتج">
                                    </div>
                                </div>
                                    @endforeach
                                  
                                
                                <div class="row">
                                    <div class="col-md-2 col-sm-12 mb-2 border-1">
                                        <label for="name" >سعر التوصيل</label>
                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                        <input type="text" name="delivery" class="form-control w-100" id="name" required placeholder="يرجى ادخال سعر التوصيل ">
                                    </div>
                                </div>
                                <hr>
                                <div class="tab-pane fade show active profile-overview mt-3 row" id="profile-overview">
                                    <button type="submit" class="btn btn-primary px-3 col-md-2 col-sm-12 mb-2">ارسال</button>
                                    <a href="" class="btn btn-danger px-3 col-md-2 col-sm-12   mx-sm-2 mb-2">رفض الطلب</a>
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
