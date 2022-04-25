@extends('layouts.auth-layout')
@section('title','Pharmacy Register')
@section('content')

    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="/" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">أمدادات طبية</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">سجل كمالك صيدلية</h5>
                                    <p class="text-center small">يرجى ادخال بيانات الصيدلية  </p>
                                </div>
                                <form class="row g-3 needs-validation" novalidate>
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">أسم الصيدلية</label>
                                        <input type="text" name="name" class="form-control" id="yourName" required>
                                        <div class="invalid-feedback">يرجى  اسم الصيدلية </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">رقم الهاتف</label>
                                        <input type="tel" name="email" class="form-control" id="yourEmail" required>
                                        <div class="invalid-feedback">يرجى ادخال  رقم الهاتف!</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">رقم الموبايل</label>
                                        <input type="text" name="email" class="form-control" id="yourEmail" required>
                                        <div class="invalid-feedback">يرجى ادخال   رقم الموبايل!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">رقم  الترخيص</label>
                                        <input type="number" name="password" class="form-control" id="yourPassword" required>
                                        <div class="invalid-feedback">يرجى ادخال رقم الترخيص   </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="inputState" class="form-label">المحافظة</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>حدد المحافظة</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="inputState" class="form-label">المدينة</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>حدد المدينة</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputState" class="form-label">تفاصيل اخرى</label>
                                        <div class="form-floating">
                                            <textarea class="form-control text-right" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
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
                                        <p class="small mb-0">بالفعل لديك حساب ؟ <a href="login.html">تسجيل الدخول</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection
