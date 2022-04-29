@extends('layouts.auth-layout')
@section('title', 'انشاء حساب جديد')
@section('content')
<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center p-3 pt-0">

                <!-- Logo -->
                <div class="d-flex justify-content-center py-4">
                    <a href="/" class="logo d-flex align-items-center w-auto">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="">
                        <span class="d-none d-lg-block">علاجي كوم</span>
                    </a>
                </div>
                <!-- End Logo -->

                <div class="card mb-3">

                    <div class="card-body p-2">

                        <ul class="nav nav-tabs w-100 mt-2 nav-order p-2  shadow-sm rounded overflow border">

                            <li class="nav-item  w-50 fs-5  d-flex justify-content-center align-items-center">
                                <button class="nav-link active w-100" data-bs-toggle="tab" data-bs-toggle="tab" data-bs-target="#user-register">انشاء حساب مستخدم</button>
                            </li>

                            <li class="nav-item  w-50 fs-5  d-flex justify-content-center align-items-center">
                                <button class="nav-link w-100" data-bs-toggle="tab" data-bs-target="#pharmacy-register">انشاء حساب صيدلية</button>
                            </li>

                        </ul>
                        <div class="tab-content p-3 pt-2">
                            <div class="tab-pane fade profile-edit show active" id="user-register">
                                <div class="pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">قم بانشاء حساب جديد</h5>
                                    <p class="text-center small">يرجى ادخال بياناتك الشخصية لأنشاء حساب</p>
                                </div>
                                <form class="row g-3 needs-validation" novalidate method="POST"
                                      action="{{ route('register') }}">
                                    @csrf
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">أسم المستخدم</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">البريد الالكتروني</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                        <div class="invalid-feedback">يرجى ادخال بريد الكتروني صالح !</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">كلمة المرور</label>
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror" name="password"
                                               required autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                        <div class="invalid-feedback">يرجى ادخال كلمة مرور</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">تأكيد كلمة المرور</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required autocomplete="new-password">
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="terms" type="checkbox" value=""
                                                   id="acceptTerms" required>
                                            <label class="form-check-label" for="acceptTerms">أوافق و اقبل <a href="#">الشروط
                                                    والسياسات الخاصة بالموقع</a></label>
                                            <div class="invalid-feedback">يجب ان تقبل بالشروط قبل أنشاء الحساب</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">أنشاء حساب</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">بالفعل لديك حساب ؟ <a href="{{ route('login') }}">تسجيل الدخول</a>
                                        </p>
                                    </div>
                                </form>
                            </div>


                            <div class="tab-pane fade" id="pharmacy-register">
                                <div class="pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">سجل كمالك صيدلية</h5>
                                    <p class="text-center small">يرجى ادخال بيانات الصيدلية  </p>
                                </div>
                                <form class="row g-3 needs-validation" novalidate method="POST"
                                action="{{ route('') }}">
                                @csrf
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">أسم الصيدلية</label>
                                        <input type="text"  id="pharmacy_name"  class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>
                                    <div class="col-12">
                                        <label for="phone" class="form-label">رقم الهاتف</label>
                                        <input type="tel"  id="phone" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="mobile" class="form-label">رقم الموبايل</label>
                                        <input type="text"  id="mobile" class="form-control @error('mobile') is-invalid @enderror"
                                        name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>
                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="license" class="form-label">رقم  الترخيص</label>
                                        <input type="number" id="license" class="form-control @error('license') is-invalid @enderror"
                                        name="license" value="{{ old('license') }}" required autocomplete="license" autofocus>
                                        @error('license')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="state" class="form-label">المحافظة</label>
                                                <select class="form-select" aria-label="Default select example" name="state" id="state">
                                                    <option selected>حدد المحافظة</option>
                                                    <option value="1">حضرموت</option>
                                                    <option value="2">عدن</option>
                                                    <option value="3">تعز</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="city" class="form-label">المدينة</label>
                                                <select class="form-select" aria-label="Default select example" name="city" id="city">
                                                    <option selected>حدد المدينة</option>
                                                    <option value="1">المكلا</option>
                                                    <option value="2">الديس</option>
                                                    <option value="3">الشرج</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="description" class="form-label">تفاصيل اخرى</label>
                                        <div class="form-floating">
                                            <textarea class="form-control text-right" name="description" placeholder="Leave a comment here" id="description" style="height: 100px"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                                            <label class="form-check-label" for="acceptTerms">أوافق و اقبل <a href="#">الشروط والسياسات الخاصة بالموقع</a></label>
                                            <div class="invalid-feedback">يجب ان تقبل بالشروط قبل أنشاء الحساب</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">أنشاء حساب</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">بالفعل لديك حساب ؟ <a href="{{ route('login') }}">تسجيل الدخول</a>
                                        </p>
                                    </div>
                                </form>
                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
@endsection
