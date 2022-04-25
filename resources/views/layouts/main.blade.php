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
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ar.css') }}">
    <!--

    TemplateMo 559 Zay Shop

    https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <!-- Main Logo -->
    <div class="d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
            <img class="m-4" src="{{ asset('assets/img/logo.png') }}" alt="">
            <span class="d-none d-lg-block">علاجي كوم</span>
        </a>
    </div>
    <!-- End Logo -->

<<<<<<< HEAD
            <a class="navbar-brand logo h3 align-self-center col-lg-auto col-md-10 col-sm-8" href="index.html">
                <img src="assets/img/logo.png" alt="">
                علاجي كوم
            </a>
            @auth('web')
            <div class="order-lg-2 order-md-1 nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <i class="fa fa-fw fa-user text-dark mr-2"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile ">
                    <li class="dropdown-header">
                        <h6>{{ auth()->user()->name }}</h6>
                        <span></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('show.profile') }}">
                            <i class="bi bi-person"></i>
                            <span> الملف الشخصي </span>
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
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>تسجيل الخروج</span>
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
            @endauth

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
                    @guest
                    @if (Route::has('login'))
                    <a class="nav-icon position-relative text-decoration-none" href="{{ route('login') }}">تسجيل </a>
                    @endif

                    @if (Route::has('register'))
                    <a class="nav-icon position-relative text-decoration-none" href="{{ route('register') }}">انشاء حساب
                    </a>
                    @endif
                    @else
                    <form action="{{ route('pharmacy.create') }}" method="get">
                        <button class="nav-icon position-relative text-decoration-none" > تحويل الحساب الى حساب صيدليه </button>
                    </form>
                    @endguest
                </div>
            </div>

        </div>
=======
    <!-- Main Links Bar -->
    <nav class="header-nav w-100">
        <ul class="d-flex align-items-center flex-fill justify-content-center d-md-flex d-none">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pharmacies') }}">{{ __('الصيدليات') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">{{ __('الشركاء') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">{{ __('التواصل') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">{{ __('حولنا') }}</a>
            </li>
        </ul>
>>>>>>> f1205cf46a50fb80b6a32a32cf4000092da7ec69
    </nav>

    <!-- Icons Navigation -->
    <nav class="header-nav">
        <ul class="d-flex align-items-center">
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
            <!-- Notification Nav -->
                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            لديك 4 اشعارات جديدة
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">عرض الكل</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>محمد زبير</h4>
                                <p>وصفة طبية مستعجلة</p>
                                <p>منذ 30 دقيقة</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>محمد زبير</h4>
                                <p>وصفة طبية مستعجلة</p>
                                <p>منذ 30 دقيقة</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>محمد زبير</h4>
                                <p>وصفة طبية مستعجلة</p>
                                <p>منذ 30 دقيقة</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>محمد زبير</h4>
                                <p>وصفة طبية مستعجلة</p>
                                <p>منذ 30 دقيقة</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">عرض جميع الاشعارات</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li>
                <!-- End Notification Nav -->

                <!-- Messages Nav -->
                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            لديك 3 رسائل جديدة
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">عرض الجميع</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>ناصر الغيثي</h4>
                                    <p>ممكن دواء بديل للصداع</p>
                                    <p>منذ 4 ساعات</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>ناصر الغيثي</h4>
                                    <p>ممكن دواء بديل للصداع</p>
                                    <p>منذ 4 ساعات</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>ناصر الغيثي</h4>
                                    <p>ممكن دواء بديل للصداع</p>
                                    <p>منذ 4 ساعات</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">عرض جميع الرسائل</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li>
                <!-- End Messages Nav -->

                <!-- Profile Nav -->
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="assets/img/user.png" alt="Profile" class="rounded-circle p-1 border">
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="profile">
                                <i class="bi bi-person"></i>
                                <span>الملف الشخصي</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('edit.profile') }}">
                                <i class="bi bi-gear"></i>
                                <span>اعدادات الحساب</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>هل تحتاج المساعدة ؟</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>تسجيل الخروج</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->
            @endguest

        </ul>
    </nav>
    <!-- End Icons Navigation -->
    <button class="d-md-none d-sm-inline-block  navbar-toggler border-0 text-black" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </button>

</header>
<!-- End Header -->



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
                            <a class="text-decoration-none"
                                href="mailto:imgsalSublies@gmail.com">imgsalSublies@gmail.com</a>
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
<<<<<<< HEAD
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            جميع الحقوق محفوظة لدى علاجي كوم
                            | Designed by <a rel="sponsored" href="https://jaweb.com" target="_blank">Jaweb Company</a>
                        </p>
=======
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
                            <input type="text" class="form-control bg-dark border-light text-light" id="subscribeEmail"
                                placeholder="Email address">
                            <div class="input-group-text btn-success text-white">Subscribe</div>
                        </div>
>>>>>>> f1205cf46a50fb80b6a32a32cf4000092da7ec69
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