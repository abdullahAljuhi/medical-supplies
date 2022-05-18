@extends("layouts.main")
@section('content')

<!--Display Error-->
<!-- @if($errors->any())
    {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
@endif -->

@include('alerts.errors')
@include('alerts.success')


    <div class="container  mt-3">
        <section class="section   profile">
            <div class="row">

                <div class="col-xl-4 ">
                    <div class="col">
                        <div class="card h-100 ">
                            @if($pharmacy->image)
                                <img src="{{asset('assets/images/pharmacies/'.$pharmacy->image)}}" alt="pharmacy"
                                     class="rounded-circle border p-1">
                            @else

                                <img src="{{asset('img/pharmacy.png') }}" class="card-img-top img-card-cus w-100 h-100 px-5"
                                     alt="...">
                            @endif
                            <div class="card-body pb-5">
                                <h5 class="card-title fs-4 text-primary text-center"> {{ $pharmacy->pharmacy_name }}</h5>
                                <p class="card-text fs-5 text-secondary text-center w-100"><i
                                        class="bi bi-geo-alt  text-primary ms-1"></i>
                                    {{ $pharmacy->address[0]->governorate->name?? '' }} - {{
                                $pharmacy->address[0]->city->name ??''}} </p>
                                <p class="text-center pb-2">
                                    {{$pharmacy->address[0]->street ??''}}
                                </p>

                                <ul class="text-center footer-icons d-flex justify-content-center mb-0">
                                    <li class="list-inline-item text-center">
                                        <a class="text-light text-decoration-none" target="_blank"
                                           href="{{ $pharmacy->contact[0]->facebook ?? ''}}">
                                            <i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                    </li>
                                    <li class="list-inline-item  text-center">
                                        <a class="text-light text-decoration-none" target="_blank"
                                           href="{{ $pharmacy->contact[0]->instagram ?? 'https://instagram.com/'}}"><i
                                                class="fab fa-instagram fa-lg fa-fw"></i></a>
                                    </li>
                                    <li class="list-inline-item  text-center">
                                        <a class="text-light text-decoration-none" target="_blank"
                                           href="{{ $pharmacy->contact[0]->twitter ?? 'https://twitter.com/'}}"><i
                                                class="fab fa-twitter fa-lg fa-fw"></i></a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-8  ">

                    <div class=" p-5  shadow  cust-card" style="margin-bottom: 0px; overflow: hidden;border-radius: 1rem;">
                        <div class="card-body p-0" >
                            <div class="row m-2 fw-bold">
                                اطلب عن طريق :
                            </div>
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs w-100 p-0 nav-order rounded overflow p-2 border">
                                <li class="nav-item  w-50   d-flex justify-content-center align-items-center ">
                                    <button class="nav-link active btn-outline-primary w-100  rounded-left" data-bs-toggle="tab" data-bs-target="#profile-settings">   اسم العلاج</button>
                                </li>

                                <li class="nav-item  w-50   d-flex justify-content-center align-items-center">
                                    <button class="nav-link w-100   " data-bs-toggle="tab" data-bs-target="#profile-change-password">   الوصفة الطبية</button>
                                </li>

                            </ul>
                            <div class="tab-content p-4 py-1">

                                <div class="tab-pane fade  show active" id="profile-settings">
                                    <form class=" needs-validation" novalidate method="POST"
                                          action="{{ route ('send')}}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row m-2">
                                            <label for="name" class="col-md-12 col-form-label fw-bold">
                                                اسم العلاج
                                                <span class="  me-1  fw-bold" style="font-size: 15px"> (اضغط على + من اجل اضافة المزيد)</span></label>
                                            <div class=" mb-3  field_wrapper">
                                                <input type="text" id="name" placeholder="قم بكتابة اسم العلاج مثل بندول او فوار..." class=" col-12 col-md-8 mb-2 form-control-custome
                                    "name='product_name[]' autofocus>

                                                <input type="text" id="name" placeholder="حدد الكمية" class=" col-md-3 col-12 form-control-custome mb-2
                                    "name='quantity[]' autofocus>
                                                <input type="hidden" id="name" name='user' value="{{ Auth::user()->id }}">
                                                <input type="hidden" id="name" name='pharmacy' value="{{ $pharmacy->id }}">
                                                <a href="javascript:void(0);" class="add_button col-md-1 col-12 text-center  pe-2" title="Add field"><i class="bi fs-3 bi-plus-circle-fill"></i></a>
                                            </div>
                                        </div>
                                        <div class="row   py-3 px-2 ">
                                            <div class="col-12">
                                                <div class="row mb-3   ">
                                                    <label for="inputState" class="form-label  fw-bold"> عنوان التوصيل</label>
                                                    <div class="col-md-6 col-12 mb-2">
                                                        <label for="inputState" class="form-label">المحافظة</label>
                                                        <select name="governorate" class="form-select select1 mx-2"
                                                                id="inputGroupSelect01">
                                                            @foreach ($governorates as $governorat)
                                                                <option value="{{ $governorat->name }}" >
                                                                    {{ $governorat->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-2">
                                                        <label for="inputState" class="form-label">المدينة</label>
                                                        <select name="city" class="form-select select2 mx-2" id="inputGroupSelect02"
                                                                style="">
                                                            @foreach ($cities as $city)
                                                                <option value="{{ $city->name }}" >{{ $city->name }}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mx-2">
                                                <label for="fullName" class="form-label">
                                                    تفاصيل اخرى عن العنوان
                                                </label>
                                                       <input type="text" name="details" class="form-control @error('details') is-invalid @enderror" id="details" required>
                                    @error('details')
                                       <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                            </div>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-primary">ارسال الطلب</button>
                                        </div>
                                    </form>


                                </div>

                                <div class="tab-pane fade pt-0" id="profile-change-password">
                                    <form class=" needs-validation" novalidate method="POST"
                                          enctype="multipart/form-data"  action="{{ route ('send')}}">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="phote" class="col-md-12  col-form-label fw-bold"> صورة الوصفة او العلاج
                                                <span class="  me-1  fw-bold" style="font-size: 15px"> (يمكنك تحديد اكثر من صورة)</span>
                                            </label>
                                            <div class=" mb-3  field_wrapper_file">
                                                <input type="file" class=" col-12 col-md-8 mb-2 form-control-custome custom-file-input @error('phote') is-invalid @enderror"
                                                       name="images[]" value="{{ old('phote') }}" required autocomplete="phote" autofocus >
                                                <input type="text" id="name" placeholder="حدد الكمية" class=" col-md-3 col-12 form-control-custome mb-2 py-2
                                                "name='quantity[]' autofocus>
                                                <input type="hidden" id="name" name='user' value="{{ Auth::user()->id }}">
                                                <input type="hidden" id="name" name='pharmacy' value="{{ $pharmacy->id }}">
                                                <a href="javascript:void(0);" class="add_button_file col-md-1 col-12 text-center  pe-2" title="Add field"><i class="bi fs-3 bi-plus-circle-fill"></i></a>
                                                <div class="message-error col-12">يرجى ادخال ملف من نوع صورة</div>
                                            </div>
                                            <div class="row   py-3 px-2 ">
                                                <div class="col-12">
                                                    <div class="row mb-3   ">
                                                        <label for="inputState" class="form-label  fw-bold"> عنوان التوصيل</label>
                                                        <div class="col-md-6 col-12 mb-2">
                                                            <label for="inputState" class="form-label">المحافظة</label>
                                                            <select name="governorate" class="form-select select1 mx-2"
                                                                    id="inputGroupSelect01">
                                                                @foreach ($governorates as $governorat)
                                                                    <option value="{{ $governorat->name }}" >
                                                                        {{ $governorat->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 col-12 mb-2">
                                                            <label for="inputState" class="form-label">المدينة</label>
                                                            <select name="city" class="form-select select2 mx-2" id="inputGroupSelect02"
                                                                    style="">
                                                                @foreach ($cities as $city)
                                                                    <option value="{{ $city->name }}" >{{ $city->name }}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 mx-2">
                                                    <label for="fullName" class="form-label">
                                                        تفاصيل اخرى عن العنوان
                                                    </label>
                                                    <input type="text" name="details" class="form-control" id="yourPassword" required>
                                                    <div class="invalid-feedback">يرجى ادخال رقم الترخيص </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name='type'  value='1' class="btn btn-primary">ارسال الطلب</button>
                                        </div>
                                    </form>
                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

@endsection
