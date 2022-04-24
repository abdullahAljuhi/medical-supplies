<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Register - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href=" {{asset('js/img/favicon.png') }}" rel="icon">
  <link href="   {{asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="  {{asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href=" {{asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{asset('vendor/boxicons/css/boxicons.min.css ') }}" rel="stylesheet">
  <link href=" {{asset('vendor/quill/quill.snow.css ') }}" rel="stylesheet">
  <link href=" {{asset('vendor/quill/quill.bubble.css ') }}" rel="stylesheet">
  <link href=" {{asset('vendor/remixicon/remixicon.css ') }}" rel="stylesheet">
  <link href=" {{asset('vendor/simple-datatables/style.css ') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('css/style.css ') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/ar.css ') }}">

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

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
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
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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