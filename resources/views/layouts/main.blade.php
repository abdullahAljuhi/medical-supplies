<!DOCTYPE html>
<html lang="en">

<head>
    <title>علاجي كوم </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset('img/apple-icon.png') }} ">
    <link rel="shortcut icon" type="image/x-icon" href=" {{ asset('img/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!--

    TemplateMo 559 Zay Shop

    https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">

            <a class="navbar-brand logo h3 align-self-center col-lg-auto col-md-10 col-sm-8" href="index.html">
                <img src="assets/img/logo.png" alt="">
                علاجي كوم
            </a>

            <div class="order-lg-2 order-md-1 nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                  <i class="fa fa-fw fa-user text-dark mr-2"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                  <li class="dropdown-header">
                    <h6>Kevin Anderson</h6>
                    <span>Web Designer</span>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>

                  <li>
                    <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                      <i class="bi bi-person"></i>
                      <span>My Profile</span>
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>

                  <li>
                    <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                      <i class="bi bi-gear"></i>
                      <span>Account Settings</span>
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>

                  <li>
                    <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                      <i class="bi bi-question-circle"></i>
                      <span>Need Help?</span>
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>

                  <li>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <i class="bi bi-box-arrow-right"></i>
                      <span>Sign Out</span>
                    </a>
                  </li>
                </ul>
            </div>
            <!-- End Profile Dropdown Items -->
            <button class="order-lg-1 order-md-2 navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="order-lg-1 order-md-2 align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
                id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">الصيدليات</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">الشركاء</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">التواصل</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="shop.html">حولنا</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">


                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span
                            class="position-absolute   translate-middle badge rounded bg-light text-dark shopping">7</span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">AR</a>
                    <a class="nav-icon position-relative text-decoration-none" href="login.html">تسجيل </a>
                    <a class="nav-icon position-relative text-decoration-none" href="register.html">انشاء حساب </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->



    @yield('content')


        <!-- Start Footer -->
        <footer class="bg-dark" id="tempaltemo_footer">
            <div class="container">
                <div class="row">

                    <div class="col-md-4 pt-5">
                        <h2 class="h2 text-success border-bottom pb-3 border-light logo">علاجي كوم </h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li>
                                <i class="fas fa-map-marker-alt fa-fw"></i>
                                Yemen Hdhramout Mukalla Rowad
                            </li>
                            <li>
                                <i class="fa fa-phone fa-fw"></i>
                                <a class="text-decoration-none" href="tel:096-777-0552517">770552517</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope fa-fw"></i>
                                <a class="text-decoration-none" href="mailto:imgsalSublies@gmail.com">imgsalSublies@gmail.com</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-4 pt-5">
                        <h2 class="h2 text-light border-bottom pb-3 border-light">وكالات ادوية</h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li><a class="text-decoration-none" href="#">وكالة الوادي</a></li>
                            <li><a class="text-decoration-none" href="#">وكالة الصحة</a></li>
                            <li><a class="text-decoration-none" href="#">وكالة الجبل الاخضر</a></li>
                            <li><a class="text-decoration-none" href="#">وكالة اكس ون</a></li>
                            <li><a class="text-decoration-none" href="#">وكالة حضرموت للادوية</a></li>
                            <li><a class="text-decoration-none" href="#">وكالة العيدروس</a></li>
                            <li><a class="text-decoration-none" href="#">وكالة النعمان</a></li>
                        </ul>
                    </div>

                    <div class="col-md-4 pt-5">
                        <h2 class="h2 text-light border-bottom pb-3 border-light">الصفحات</h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li><a class="text-decoration-none" href="#">الصيدليات</a></li>
                            <li><a class="text-decoration-none" href="#">الخدمات</a></li>
                            <li><a class="text-decoration-none" href="#">الشركاء</a></li>
                            <li><a class="text-decoration-none" href="#">التواصل</a></li>
                            <li><a class="text-decoration-none" href="#">حولنا</a></li>
                        </ul>
                    </div>

                </div>

                <div class="row text-light mb-4">
                    <div class="col-12 mb-3">
                        <div class="w-100 my-3 border-top border-light"></div>
                    </div>
                    <div class="col-auto me-auto">
                        <ul class=" text-center footer-icons d-flex ">
                            <li class="list-inline-item  text-center">
                                <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i
                                        class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item  text-center">
                                <a class="text-light text-decoration-none" target="_blank"
                                    href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item  text-center">
                                <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i
                                        class="fab fa-twitter fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item  text-center">
                                <a class="text-light text-decoration-none" target="_blank"
                                    href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <label class="sr-only" for="subscribeEmail">Email address</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control bg-dark border-light" id="subscribeEmail"
                                placeholder="Email address">
                            <div class="input-group-text btn-success text-light">Subscribe</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-100 bg-black py-3">
                <div class="container">
                    <div class="row pt-2">
                        <div class="col-12">
                            <p class="text-left text-light">
                                جميع الحقوق محفوظة لدى علاجي كوم
                                | Designed by <a rel="sponsored" href="https://jaweb.com"
                                    target="_blank">Jaweb Company</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
        <!-- End Footer -->

        <!-- Start Script -->
        <script src="{{asset('js/jquery-1.11.0.min.js ') }}"></script>
        <script src="{{asset('js/jquery-migrate-1.2.1.min.js ') }}"></script>
        <script src="{{asset('js/bootstrap.bundle.min.js ') }}"></script>
        <script src="{{asset('js/templatemo.js ') }}"></script>
        <script src="{{asset('js/custom.js ') }}"></script>
        <!-- End Script -->
    </body>

    </html>
