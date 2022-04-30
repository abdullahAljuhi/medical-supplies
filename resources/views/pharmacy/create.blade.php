@extends('layouts.auth-layout')
@section('title', 'انشاء حساب جديد')
@section('content')
<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center p-3 pt-0">

                <!-- Logo -->
                <div class="d-flex justify-content-center py-4" id="one">
                    <a href="/" class="logo d-flex align-items-center w-auto">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="">
                        <span class="d-none d-lg-block">علاجي كوم</span>
                    </a>
                </div>
                <!-- End Logo -->
                <form class="row g-3 needs-validation"  method="POST" enctype="multipart/form-data" novalidate action="{{ route('admin.pharmacy.store') }}">
                    @csrf
                    <div class="col-12">
                        <label for="yourName" class="form-label">أسم الصيدلية</label>
                        <input type="text" name="name" class="form-control" id="pharmacy_name" required>
                        <div class="invalid-feedback">يرجى اسم الصيدلية </div>
                    </div>

                    <div class="col-12">
                        <label for="phone" class="form-label">رقم الهاتف</label>
                        <input type="tel" name="phone" class="form-control" id="phone" required>
                        <div class="invalid-feedback">يرجى ادخال رقم الهاتف!</div>
                    </div>
                    <div class="col-12">
                        <label for="mobil" class="form-label">رقم الموبايل</label>
                        <input type="text" name="mobil" class="form-control" id="mobil" required>
                        <div class="invalid-feedback">يرجى ادخال رقم الموبايل!</div>
                    </div>

                    <div class="col-12">
                        <label for="license" class="form-label">رقم الترخيص</label>
                        <input type="number" name="license" class="form-control" id="license" required>
                        <div class="invalid-feedback">يرجى ادخال رقم الترخيص </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <label for="state" class="form-label">المحافظة</label>
                                <select class="form-select select1" aria-label="Default select example" name="state"
                                    id="state">
                                    <option selected>حدد المحافظة</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="city" class="form-label">المدينة</label>
                                <select class="form-select select2" aria-label="Default select example" name="city"
                                    id="city">
                                    <option selected>حدد المدينة</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <label for="description" class="form-label">تفاصيل اخرى</label>
                        <div class="form-floating">
                            <textarea class="form-control text-right" name="description"
                                placeholder="Leave a comment here" id="description" style="height: 100px"></textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms"
                                required>
                            <label class="form-check-label" for="acceptTerms">أوافق و اقبل <a href="#">الشروط والسياسات
                                    الخاصة بالموقع</a></label>
                            <div class="invalid-feedback">يجب ان تقبل بالشروط قبل أنشاء الحساب</div>
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">أنشاء حساب</button>
                    </div>
                    <div class="col-12">
                        <p class="small mb-0">بالفعل لديك حساب ؟ <a href="login">تسجيل الدخول</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection