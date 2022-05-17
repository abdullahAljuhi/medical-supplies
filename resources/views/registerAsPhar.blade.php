@extends('layouts.auth-layout')
@section('title','Pharmacy Register')
@section('content')


@include('alerts.errors')
@include('alerts.success')

<!--Display Error-->
<!-- @if($errors->any())
    {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
@endif -->



<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="/" class="logo d-flex align-items-center w-auto">
                            <img src="assets/img/logo.png" alt="">
                            <span class="d-none d-lg-block">علاجي كوم</span>
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">سجل كمالك صيدلية</h5>
                                <p class="text-center small">يرجى ادخال بيانات الصيدلية </p>
                            </div>
                            <form class="row g-3 needs-validation" novalidate method="POST"
                                action="{{ route('pharmacy.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label for="yourName" class="form-label">أسم الصيدلية</label>
                                    <input type="text" name="pharmacy_name" class="form-control" id="yourName" required>
                                    @error('pharmacy_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                                    <div class="invalid-feedback">يرجى اسم الصيدلية </div>
                                </div>

                                <div class="col-12">
                                    <label for="yourphone" class="form-label">رقم الهاتف</label>
                                    <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" id="yourphone" required>
                                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                                    <div class="invalid-feedback">يرجى ادخال رقم الهاتف!</div>
                                </div>
                                <div class="col-12">
                                    <label for="yourmobile" class="form-label">رقم الموبايل</label>
                                    <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" id="yourmobile" required>
                                    @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                                    <div class="invalid-feedback">يرجى ادخال رقم الموبايل!</div>
                                </div>

                                <div class="col-12">
                                    <label for="liscen" class="form-label">صورة الترخيص</label>
                                    <input type="file" name="license" class="form-control @error('license') is-invalid @enderror" id="liscen" required>
                                    @error('license')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                                    <div class="invalid-feedback">يرجى ادخال رقم الترخيص </div>

                 
                                    </div>
                                                   <div class="col-12">
                                        <div class="row">
                                            <label for="liscen" class="form-label">العنوان</label>
                                            <div class="col-6">
                                                <select name="governorate" id="select1"
                                                        class="form-select select1 form-control p-2 pe-5"
                                                        aria-label=".form-select-lg example">

                                                    <option value="0" disabled selected>جميع المحافظات</option>
                                                    @foreach ($governorates as $governorat)
                                                        <option value="{{ $governorat->id }}">
                                                            {{ $governorat->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-6 second">
                                                <select name="city" id="select2"
                                                        class="form-select select2 form-control p-2 pe-5"
                                                        aria-label=".form-select-lg example">
                                                    @foreach ($cities as $city)
                                                        <option class="city{{ $city->governorate_id }}"
                                                                value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12">
                                </div>
                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">الشارع</label>
                                    <input type="text" name="street" class="form-control @error('street') is-invalid @enderror" id="yourPassword" required>
                                    @error('street')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                                    <div class="invalid-feedback">  </div>
                                </div>
                                <div class="col-12">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">تفاصيل
                                        العنوان</label>
                                    <input type="text" name="details" class="form-control @error('details') is-invalid @enderror" id="yourPassword" required>
                                    @error('details')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                                    <div class="invalid-feedback"> </div>
                                </div>
                                <div class="col-12">
                                    <label for="inputState" class="form-label">وصف عن الصيدلية</label>
                                    <div class="form-floating">
                                        <textarea class="form-control text-right" name="description"
                                                  placeholder="Leave a comment here" id="floatingTextarea2"
                                                  style="height: 100px"></textarea>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="terms" type="checkbox" value=""
                                                   id="acceptTerms" required>
                                            <label class="form-check-label" for="acceptTerms">أوافق و اقبل <a
                                                    href="#">الشروط والسياسات الخاصة بالموقع</a></label>
                                            <div class="invalid-feedback">يجب ان تقبل بالشروط قبل أنشاء الحساب</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">أنشاء حساب</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">بالفعل لديك حساب ؟ <a href="login.html">تسجيل الدخول</a>
                                        </p>
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
@section('scripts')
    <script>
        $("#select1").change(select);

        function select() {
            if ($(this).data('options') === undefined) {
                /*Taking an array of all options-2 and kind of embedding it on the select1*/
                $(this).data('options', $('#select2 option').clone());
            }
            if ($(this).val() == 0) {
                $('#select2').html($(this).data('options'));
                return;
            }
            var id = $(this).val();
            var options = $(this).data('options').filter('[class=city' + id + ']');
            $('#select2').html(options);
        }
    </script>
@endsection
