@extends( 'layouts.app')
@section('title', 'الملف الشخصي')
@section('content')

@include('alerts.errors')
@include('alerts.success')
<!--Display Error-->
<!-- @if($errors->any())
    {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
@endif -->

    <!-- Page Title -->
    <div class="pagetitle">
        <h1>ملف الصيدلية</h1>
        <nav>
            <ol class="breadcrumb">
{{--                <li class="breadcrumb-item"><a href="../index.blade.php">الرائيسية</a></li>--}}
{{--                <li class="breadcrumb-item active">ملف الصيدلية</li>--}}
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section profile min-vh-100 overflow-hidden">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        @if($pharmacy->image)
                        <img src="{{asset('assets/images/pharmacies/'.$pharmacy->image)}}" alt="Profile" class="rounded-circle border p-1"style="width: 130px;
                                                height: 130px; object-fit: contain">
                        @else
                        <img src="{{asset('assets/img/user.png') }}" alt="Profile" class="rounded-circle border p-1">
                        @endif
                       <h5 class="card-title fs-4 text-primary text-center">{{ $pharmacy->pharmacy_name }} </h5>
                        <p class="card-text fs-5 text-secondary text-center w-100"><i class="bi bi-geo-alt  text-primary ms-1"></i> {{ $pharmacy->address[0]->governorate->name?? '' }} -  {{ $pharmacy->address[0]->city->name ??''}} </p>
                        <ul class="text-center footer-icons d-flex justify-content-center mb-0">
                            <li class="list-inline-item text-center">
                                <a class="  text-decoration-none" target="_blank" href="{{ $pharmacy->contact[0]->facebook ?? ''}}"><i
                                        class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item  text-center">
                                <a class=" text-decoration-none" target="_blank"
                                   href="{{ $pharmacy->contact[0]->instagram ?? 'https://www.instagram.com'}}><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item  text-center">
                                <a class=" text-decoration-none" target="_blank" href="{{ $pharmacy->contact[0]->twitter ?? 'https://twitter.com/'}}"><i
                                        class="fab fa-twitter fa-lg fa-fw"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs justify-content-center">

                            <li class="nav-item p-1">
                                <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-edit">تعديل ملف الصيدلية
                                </button>
                            </li>

                            <li class="nav-item p-1">
                                <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">تغيير كلمة
                                    المرور
                                </button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade profile-edit show active pt-3" id="profile-edit">


                                <!-- Profile Edit Form -->
                                <form method="POST" action="{{ route('pharmacy.update') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">الصورة
                                            الشخصية</label>
                                        <div class="col-md-8 col-lg-9 d-flex align-items-center justify-content-center">
                                            <div class="row">
                                                @if($pharmacy->image)
                                                    <img src="{{asset('assets/images/pharmacies/'.$pharmacy->image)}}"
                                                         alt="Profile"
                                                         class="mx-auto rounded-circle border p-1" id="blah" style="width: 120px;
                                                height: 120px;">
                                                @else
                                                    <img src="{{asset('assets/img/user.png') }}" alt="Profile"
                                                         class="mx-auto rounded-circle border p-1" id="blah" style="max-width: 120px;
                                                max-height: 120px;">
                                                @endif
                                                <div style="transform: translate(-25px,-35px);">
                                                    <label class="btn bg-white border rounded-circle ">
                                                        <i class="bi bi-camera-fill fs-5"></i>
                                                        <input type="file" id="imgInp" name="image" hidden class="custom-file-input">
                                                    </label>
                                                    <a href="#" class="btn btn-danger btn-sm d-none"
                                                       title="Remove my profile image">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="message-error col-12 text-center">يرجى ادخال ملف من نوع صورة</div>
                                        </div>
                                    </div>

                                    {{-- <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">الصورة
                                            الشخصية</label>
                                        <div class="col-md-8 col-lg-9 d-flex align-items-center justify-content-around">
                                            <div class="pt-2">
                                                <label class="btn btn-primary text-light">
                                                    <i class="bi bi-upload p-5"></i>
                                                    <input type="file" id="imgInp" name="image" hidden>
                                                </label>
                                                <a href="#" class="btn btn-danger btn-sm d-none"
                                                   title="Remove my profile image">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                            @if($pharmacy->image)
                                            <img src="{{asset('assets/images/pharmacies/'.$pharmacy->image)}}" alt="Profile" class="rounded-circle border p-1">
                                            @else
                                            <img id="blah" src="{{asset('assets/img/user.png') }}" alt="Profile" class="rounded-circle border p-1">
                                            @endif
                                        </div>
                                    </div> --}}

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">اسم
                                            الكامل</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="pharmacy_name" type="text" class="form-control @error('pharmacy_name') is-invalid @enderror" id="fullName"
                                                   value="{{ $pharmacy->pharmacy_name }}">
                                            @error('pharmacy_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                               </span>
                                           @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">رقم الهاتف</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" id="company"
                                                   value="{{ $pharmacy->phone }}">
                                            @error('phone')
                                               <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                              </span>
                                           @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">رثم الموبايل</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" id="company"
                                                   value="{{ $pharmacy->mobile ?? ''}}">
                                            @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-8 col-lg-9 input-group">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">العنوان</label>
                                            <select name="governorate" class="form-select select1 mx-2"
                                                    id="inputGroupSelect01">
                                                    @foreach ($governorates as $governorat)
                                                    <option value="{{ $governorat->id }}" {{ ($pharmacy->address[0]->governorate_id == $governorat->id) ? 'selected' :'' }}>
                                                        {{ $governorat->name }}
                                                    </option>
                                                    @endforeach
                                            </select>
                                             <select name="city" class="form-select select2 mx-2" id="inputGroupSelect02"
                                                    style="">
                                                    @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}" {{ $pharmacy->address[0]->city_id == $city->id ? 'selected' : ''}}>{{ $city->name }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">الشارع</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="street" type="text" class="form-control @error('street') is-invalid @enderror" id="fullName"
                                                   value="{{ $pharmacy->address[0]->street??''}}">
                                            @error('street')
                                               <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                               </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">تفاصيل العنوان</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="details" type="text" class="form-control @error('details') is-invalid @enderror" id="fullName"
                                            value="{{ $pharmacy->address[0]->details??''}}">
                                            @error('details')
                                             <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                           </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">رابط الفيسبوك</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="facebook" type="url" class="form-control @error('facebook') is-invalid @enderror" id="company"
                                                   value="{{ $pharmacy->contact[0]->facebook?? ''}}">
                                                   @error('facebook')
                                                   <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                          </span>
                                                  @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">رابط الانستقرام</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="instgram" type="url" class="form-control @error('instagram') is-invalid @enderror" id="company"
                                            value="{{ $pharmacy->contact[0]->instagram?? ''}}">
                                            @error('instgram')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">رابط تويتر</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="twitter" type="url" class="form-control @error('twitter') is-invalid @enderror" id="company"
                                            value="{{ $pharmacy->contact[0]->twitter?? ''}}">
                                            @error('twitter')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">رابط لاينكدن</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="linkdin" type="url" class="form-control @error('linkdin') is-invalid @enderror" id="company"
                                            value="{{ $pharmacy->contact[0]->linkdin?? ''}}">
                                            @error('linkdin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">وصف عن الصيدلية</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea class="form-control"  name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;">
                                                {{ $pharmacy->description??'' }}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->
                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form method="POST"
                                    action="">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">كلمة
                                            المرور الحالية</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                                   id="currentPassword">
                                                   @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">كلمة المرور
                                            الجديدة</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control @error('newpassword') is-invalid @enderror"
                                                   id="newPassword">
                                                   @error('newPassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">تأكيد كلمة
                                            المرور
                                            الجديدة</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control @error('renewpassword') is-invalid @enderror"
                                                   id="renewPassword">
                                                   @error('renewpassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
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
