@extends('layouts.auth-layout')
@section('title','التأكد من البريد الالكتروني')
@section('content')

<!--Display Error-->
<!-- @if($errors->any())
    {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
@endif -->

@include('alerts.errors')
@include('alerts.success')

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <div class="container">
            <div class="d-flex justify-content-center py-4">
                <a href="/" class="logo d-flex align-items-center w-auto">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="">
                    <span class="d-none d-lg-block">علاجي كوم</span>
                </a>
            </div><!-- End Logo -->

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('اعادة تأكيد البريد الاكتروني') }}</div>

                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('تم إرسال رابط تحقق جديد إلى عنوان بريدك الإلكتروني.') }}
                                </div>
                            @endif

                            {{ __('قبل المتابعة ، يرجى التحقق من بريدك الإلكتروني للحصول على رابط التحقق.') }}
                            {{ __('إذا لم تستلم البريد الإلكتروني') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit"
                                        class="btn btn-link p-0 m-0 align-baseline">{{ __('انقر هنا لطلب آخر') }}</button>
                                .
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>
    </section>
@endsection
