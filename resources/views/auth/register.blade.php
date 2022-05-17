@extends('layouts.auth-layout')
@section('title', 'انشاء حساب جديد')
@section('content')

<!--Display Error-->
<!-- @if($errors->any())
    {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
@endif -->

@include('alerts.errors')
@include('alerts.success')

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center p-3 pt-0">

                <!-- Logo -->
                <div class="d-flex justify-content-center py-4" id="one">
                    <a href="/" class="logo d-flex align-items-center w-auto">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="">
                        <span class="d-block">علاجي كوم</span>
                    </a>
                </div>
                <!-- End Logo -->

                <div class="card mb-3">

                    <div class="card-body p-2">
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
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">البريد الالكتروني</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">
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
                                    <div class="col-md-12 ">
                                        <label for="yourPassword" class="form-label"> نوع المستخدم</label>
                                        <select class="form-select form-control p-2 pe-5"
                                            aria-label=".form-select-lg example" name="type">
                                            <option selected value="0">مسنخدم عادي</option>
                                            <option value="2">مالك صيدلية</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="terms" type="checkbox" value=""
                                                id="acceptTerms" required>
                                            <label class="form-check-label" for="acceptTerms">أوافق و اقبل <a
                                                    href="#">الشروط
                                                    والسياسات الخاصة بالموقع</a></label>
                                            <div class="invalid-feedback">يجب ان تقبل بالشروط قبل أنشاء الحساب</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">أنشاء حساب</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">بالفعل لديك حساب ؟ <a href="{{ route('login') }}">تسجيل
                                                الدخول</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
    </div>
    </div>



    <script>
        $('#one').hide()
    </script>
    @endsection
