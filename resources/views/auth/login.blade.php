@extends('layouts.auth-layout')
@section('title', 'تسجيل الدخول')
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
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="/" class="logo d-flex align-items-center w-auto">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="">
                            <span class="d-block">علاجي كوم</span>
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">قم بتسجيل الدخول الى حسابك</h5>
                                <p class="text-center small">أدخل البريد الالكتروني و كلمة المرور</p>
                            </div>

                            <form class="row g-3 needs-validation" novalidate method="POST"
                                  action="{{ route('login') }}">
                                @csrf
                                <div class="col-12">
                                    <label for="yourEmail" class="form-label">البريد الالكتروني</label>
                                    <input class="form-control @error('email') is-invalid @enderror"id="email" type="email" 
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <p class="text-danger mt-2">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                    @enderror
                                    <div class="invalid-feedback">يرجى ادخال بريد الكتروني صالح !</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">كلمة المرور</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <p class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                    @enderror
                                    <div class="invalid-feedback">يرجى ادخال كلمة المرور</div>
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('تذكرني') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">التسجيل</button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('هل نسيت كلمت المرور ؟') }}
                                        </a>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <p class="small mb-0">ليس لديك حساب ؟ <a href="register">أنشاء حساب</a></p>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
