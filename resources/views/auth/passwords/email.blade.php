@extends('layouts.auth-layout')
@section('title','اعادة ضبط كلمة المرور')
@section('content')
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="/" class="logo d-flex align-items-center w-auto">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="">
                            <span class="d-none d-lg-block">أمدادات طبية</span>
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">أعادة ضبط كلمة المرور</h5>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form class="row g-3 needs-validation" method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="col-12">
                                    <label for="yourEmail" class="form-label py-2">البريد الالكتروني</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <p class="text-danger mt-2">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                    @enderror
                                    <div class="invalid-feedback">يرجى ادخال بريد الكتروني صالح !</div>
                                </div>

                                <div class="col-12 py-3">
                                    <button class="btn btn-primary w-100" type="submit">ارسال رابط اعادة ضبط كلمة المرور</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
