<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pages / Register - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/ar.css">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<main>
    <div class="container">

<!--Display Error-->
<!-- @if($errors->any())
    {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
@endif -->

@include('alerts.errors')
@include('alerts.success')
        <section
            class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">أمدادات طبية</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">قم بانشاء حساب جديد</h5>
                                    <p class="text-center small">يرجى ادخال بياناتك الشخصية لأنشاء حساب</p>
                                </div>

                                <form class="row g-3 needs-validation" novalidate>
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">أسم الصيدلية</label>
                                        <input type="text" name="pharmacy_name" class="form-control @error('pharmacy_name') is-invalid @enderror" id="yourName" required>
                                        @error('pharmacy_name')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="invalid-feedback">يرجى ادخال اسم الصيدلية</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourName" class="form-label">أسم المستخدم</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="yourName" required>
                                        @error('name')
                                           <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                           </span>
                                        @enderror
                                        <div class="invalid-feedback">يرجى ادخال اسم المستخدم</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">البريد الالكتروني</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="yourEmail"
                                               required>
                                        @error('email')
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                        @enderror
                                        <div class="invalid-feedback">يرجى ادخال بريد الكتروني صالح !</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="license" class="form-label">الترخيص</label>

                                        <input type="file" name="license" class="form-control custom-file-input @error('license') is-invalid @enderror" id="license"
                                               required>
                                        @error('license')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                       <div class="message-error">يرجى ادخال ملف من نوع صورة</div>

                                        <div class="invalid-feedback">يرجى ادخال بريد رفع صورة من الترخيص !</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="license" class="form-label">العنوان</label>
                                        <div class="input-group">
                                            <select class="form-select select1 mx-2" id="inputGroupSelect01">
                                                <option selected="" value="0">جميع المحفظات</option>
                                                <option value="1">حضرموت</option>
                                                <option value="2">صنعاء</option>
                                                <option value="2">تعز</option>
                                                <option value="2">عدن</option>
                                                <option value="2">المهرة</option>
                                            </select>
                                            <!-- <label class="input-group-text" for="inputGroupSelect02">Options</label> -->
                                            <select class="form-select select2 mx-2" id="inputGroupSelect02" style="">
                                                <option value="1">المكلا</option>
                                                <option value="2">سيئون</option>
                                            </select>
                                        </div>
                                        <div class="invalid-feedback">يرجى ادخال بريد رفع صورة من الترخيص !</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label @error('password') is-invalid @enderror">كلمة المرور</label>
                                        <input type="password" name="password" class="form-control"
                                               id="yourPassword" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror       
                                        <div class="invalid-feedback">يرجى ادخال كلمة مرور</div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input @error('terms') is-invalid @enderror" name="terms" type="checkbox" value=""
                                                   id="acceptTerms" required>
                                        @error('terms')
                                            <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                            <label class="form-check-label" for="acceptTerms">أوافق و اقبل <a
                                                    href="#">الشروط والسياسات الخاصة بالموقع</a></label>
                                            <div class="invalid-feedback">يجب ان تقبل بالشروط قبل أنشاء الحساب</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">أنشاء حساب</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">بالفعل لديك حساب ؟ <a href="pages-login.html">تسجيل
                                                الدخول</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.min.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>
