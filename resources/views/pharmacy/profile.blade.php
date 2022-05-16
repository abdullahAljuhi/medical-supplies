@extends('layouts.app')
@section('title', 'الصيدليات')
@section('content')
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>الملف الشخصي للصيدلية</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">لوحة التحكم</li>
                <li class="breadcrumb-item">الصيدليات</li>
                <li class="breadcrumb-item">الملف الشخصي</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section profile min-vh-100 mt-5 overflow-hidden">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        @if($pharmacy->image)
                            <img src="{{asset('assets/images/pharmacies/'.$pharmacy->image)}}" alt="Profile" class="rounded-circle border p-1">
                        @else
                            <img id="blah" src="{{asset('assets/img/user.png') }}" alt="Profile" class="rounded-circle border p-1">
                        @endif
                        {{--                        <img src="{{$user->profile['image']?asset('assets/images/users/'.$user->profile['image']) : asset('assets/img/user.png') }}" alt="Profile" class="rounded-circle">--}}
                        <h2>{{ $pharmacy->name }}</h2>
                        <h3>{{ $pharmacy->user['email'] }}</h3>
                        <div class="social-links mt-2">
                            <a href="{{ isset($pharmacy->contact->twitter) }}" class="twitter"><i
                                    class="bi bi-twitter"></i></a>
                            <a href="{{ isset($pharmacy->contact->facebook) }}" class="facebook"><i
                                    class="bi bi-facebook"></i></a>
                            <a href="{{ isset($pharmacy->contact->instagram) }}" class="instagram"><i
                                    class="bi bi-instagram"></i></a>
                            <a href="{{ isset($pharmacy->contact->linkedin) }}" class="linkedin"><i
                                    class="bi bi-linkedin"></i></a>
                        </div>
                    </div>


                </div>
            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        @if($pharmacy->user['id'] === Auth::user()->id)
                            <a href="{{ route('edit.profile') }}" class="btn btn-outline-primary"> تعديل بيانات
                                الحساب</a>
                        @endif
                        @if($pharmacy->is_active)
                            <a class="btn btn-outline-danger w-auto m-3"
                               href="{{ route('admin.pharmacy.disActive',$pharmacy->id) }}"> الغاء التفغيل</a>
                        @else
                            <a class="btn btn-outline-primary w-auto m-3"
                               href="{{ route('admin.pharmacy.active',$pharmacy->id) }}">تفغيل</a>
                    @endif
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">بيانات عامة</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">اسم الصيدلية</div>
                                    <div class="col-lg-9 col-md-8">{{ $pharmacy->pharmacy_name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">جوال</div>
                                    <div class="col-lg-9 col-md-8">
                                        @isset($pharmacy->mobile)
                                            {{$pharmacy->mobile}}
                                        @endisset</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">هاتف</div>
                                    <div class="col-lg-9 col-md-8">
                                        @isset($pharmacy->phone)
                                            {{$pharmacy->phone}}
                                        @endisset</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">العنوان</div>
                                    <div class="col-lg-9 col-md-8">{{  ($pharmacy->address[0]->governorate->name) ." - ". ($pharmacy->address[0]->city->name)}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">الشارع</div>
                                    <div class="col-lg-9 col-md-8">{{ $pharmacy->address[0]->street }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">تفاصيل العنوان</div>
                                    <div class="col-lg-9 col-md-8">{{ $pharmacy->address[0]->details }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">وصف الصيدلية</div>
                                    <div class="col-lg-9 col-md-8">{{ $pharmacy->description }}</div>
                                </div>

                                <div class="row bg-white">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button label" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                    صورة الترخيص
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse"
                                                 aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body text-center">
                                                    @if($pharmacy->license)
                                                    <img src="{{asset('assets/images/pharmacies/licenses/'.$pharmacy->license)}}" alt="pharmacy"
                                                        class="border p-1">
                                                    @else
                                                    <img src="{{asset('img/phramacy1.png') }}" class="card-img-top py-5 img-card-cus"
                                                        alt="...">
                                                    @endif
                                                    <button onclick="window.open('{{asset('assets/img/user.png') }}');"
                                                            class="btn btn-primary mt-3">تنزيل الترخيص
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
