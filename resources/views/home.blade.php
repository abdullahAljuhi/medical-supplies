@extends('layouts.app')
@section('title', 'Home')
@section('content')

    <!--Display Error-->
    <!-- @if($errors->any())
        {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
    @endif -->

    <div class="container min-vh-100">
        <div class="row justify-content-center">
            <div class="pagetitle my-3">
                <h1>لوحة التحكم</h1>
            </div>
            <!-- End Page Title -->


            <!-- Satistics -->
            <p class="px-4 mt-3 fs-5">احصائيات النظام</p>
            <div class="row">

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">

                        <div class="card-body">
                            <h5 class="card-title fs-5 fw-bolder">المبيعات</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center mx-3"
                                     style="font-size: 32px;width: 64px;height: 64px;color: #2eca6a;background: #e0f8e9;">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <span class="fs-3">$3,264</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title fs-5 fw-bolder">الطلبات</h5>

                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center mx-3"
                                    style="font-size: 32px;width: 64px;height: 64px;color: #4154f1;background: #f6f6fe;">
                                    <i class="bi bi-cart fs-2 m-4"></i>
                                </div>
                                <div class="ps-3">
                                    <span class="fs-3">145 طلب</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xxl-4 col-md-6">

                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title fs-5 fw-bolder">المسترجعة</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-danger-light mx-3"
                                     style="font-size: 32px;width: 64px;height: 64px;">
                                    <i class="bi bi-arrow-clockwise text-danger"></i>
                                </div>
                                <div class="ps-3">
                                    <span class="fs-3">205 طلب</span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-xxl-4 col-md-6">

                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title fs-5 fw-bolder">المستخدمين</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-danger-light mx-3"
                                     style="font-size: 32px;width: 64px;height: 64px;color: #ff771d;background: #ffecdf;">
                                    <i class="bi bi-people text-danger"></i>
                                </div>
                                <div class="ps-3">
                                    <span class="fs-3">1244 مستخدم</span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-xxl-4 col-md-6">

                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title fs-5 fw-bolder">الصيدليات</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-primary-light mx-3"
                                     style="font-size: 32px;width: 64px;height: 64px;">
                                    <i class="bi bi-house-door text-primary"></i>
                                </div>
                                <div class="ps-3">
                                    <span class="fs-3">1244 صيدلية</span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-xxl-4 col-md-6">

                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title fs-5 fw-bolder">الاعلانات</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-info-light mx-3"
                                     style="font-size: 32px;width: 64px;height: 64px;">
                                    <i class="bi bi-badge-ad text-info"></i>
                                </div>
                                <div class="ps-3">
                                    <span class="fs-3">14 اعلان</span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-header">{{ __('اخر الاشعارات') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id="real">
                    </div>
                    @foreach ($pharmacies as $pharmacy)
                        <div class="alert alert-warning px-0" role="alert">
                            <form action="{{ route('admin.check.pharmacy',$pharmacy->id) }}" method="get"
                                  id="my_form">
                                @csrf
                                <a href="javascript:{}"
                                   class="float-right mark-as-read d-flex flex-wrap justify-content-around text-dark"
                                   onclick="document.getElementById('my_form').submit();">
                                    <div class="text-center">
                                        <span>#</span><b>{{ $loop->index + 1  }}</b>
                                    </div>
                                    <div class="text-center">
                                        <span class="ms-2">اسم الصيدلية:</span><b>{{ $pharmacy->pharmacy_name}}</b>
                                    </div>
                                    <div class="text-center">
                                        <span class="ms-2">اسم المالك:</span><b>{{ $pharmacy->user->name}}</b>
                                    </div>
                                    <div class="text-center">
                                        <span
                                            class="ms-2">وقت التسجيل:</span><b>{{ \Carbon\Carbon::parse($pharmacy->created_at)->diffForHumans()}}</b>
                                    </div>
                                </a>
                            </form>
                        </div>
                    @endforeach
                    @if(count($pharmacies)==0)
                        <div class="text-center my-3">
                            <span class="fs-5">{{ __('لا يوجد اي اشعارات جديدة') }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
