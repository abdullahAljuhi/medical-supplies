@extends('layouts.main')
@section('title', 'طلب جديد')
@section('content')
    <!-- Page Title -->
    <div class="pagetitle mt-5 container">
        <h1>كشف عرض الاسعار</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">لوحة التحكم</a></li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section profile container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-title pb-0 mb-0">
                        <div class="row mb-2">
                            <div class="col-md-4 col-sm-12 mb-2">
                                <p class="fs-5 py-0 my-0  mx-3">رقم الطلب :
                                     {{ $order->id }}
                                </p>
                            </div>
                            <div class="col-md-8 col-sm-12 mb-2" >
                                <p class="fs-5 py-0 my-0  mx-3">  اسم الصيدلية :
                                    {{ $order->pharmacy->pharmacy_name }}
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

                    </div>

                    <div class="card-body p-0">
                        <div class="tab-content">
                            <div>
                                <div class="card-body p-0">
                                    <div class="table-responsive  pb-3 px-3">
                                        <table class="table border ">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">رقم</th>
                                                    <th class="border-0">اسم المنتج</th>
                                                    <th class="border-0">سعر المنتج</th>
                                                    <th class="border-0">كمية المنتج</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product )
                                                    {{-- {{$product  }} --}}
                                                <tr>
                                                    <td>{{ $loop->index }}</td>
                                                    <td>{{ $product['name'] }}</td>
                                                    <td>{{ $product['unit_amount'] }} </td>
                                                    <td>{{ $product['quantity'] }} </td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                  <td  colspan="2">الاجمالي</td>
                                                  <td>{{ $order->total }}</td>
                                                </tr>
                                              </tfoot>
                                        </table>
                                        <form action="{{ route('test') }}" method="get" class="overflow-hidden mx-3">
                                            <div class="tab-pane fade show active mt-3 row" id="profile-overview">
                                                <button type="submit" name="id" value="{{ $order->id }}" class="btn btn-primary px-3 col-md-2 col-sm-12 mb-2">دفع</button>
                                                <a type="submit" class="btn btn-danger px-3 col-md-2 col-sm-12   mx-sm-2 mb-2"> رفض</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                        </div>
                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
        </div>
    </section>
@endsection
