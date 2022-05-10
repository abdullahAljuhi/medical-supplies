<!DOCTYPE html>
<html lang="en">

<head>
    <title>علاجي كوم </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset('img/apple-icon.png') }} ">
    <link rel="shortcut icon" type="image/x-icon" href=" {{ asset('img/favicon.ico') }}">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/viewAndList.css') }}">


    <!-- Load fonts style after rendering the layout styles -->

    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ar.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!--  google font  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
      <!--

    TemplateMo 559 Zay Shop

    https://templatemo.com/tm-559-zay-shop

-->
</head>

<body style="overflow-x: hidden">

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center position-absolute">

    <!-- Main Logo -->
    <div class="d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
            <img class="mx-4 h-100" src="{{ asset('assets/img/logo.png') }}" alt="">
            <span class="text-nowrap">علاجي كوم</span>
        </a>
    </div>
    <!-- End Logo -->

    <!-- Main Links Bar -->
    <nav class="header-nav w-100">
        <ul class="d-flex align-items-center flex-fill justify-content-center d-md-flex d-none">
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('morePharmacy') }}">{{ __('الصيدليات') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('partners') }}">{{ __('الشركاء') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('contact') }}">{{ __('التواصل') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('about') }}">{{ __('حولنا') }}</a>
            </li>
        </ul>
    </nav>

    <!-- Icons Navigation -->
    <nav class="header-nav d-sm-block d-none">
        <ul class="d-flex align-items-center">
            @guest
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-primary mx-2 text-nowrap py-1"
                           href="{{ route('register') }}">{{ __('انشاء حساب') }}</a>
                    </li>
                @endif

                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary mx-2 text-nowrap py-1"
                           href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
                    </li>
                @endif
            @else
       <!-- Notification Nav -->
       <li class="nav-item dropdown dropdown-notifications">

        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" data-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number" data-count="4">4</span>
        </a><!-- End Notification Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
                لديك 4 اشعارات جديدة
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">عرض الكل</span></a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>

            <li class="notification-item scrollable-container">
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

                <!-- Profile Nav -->
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        @if(isset(Auth::user()->profile->image))
                        <img src="{{asset('assets/images/users/'.Auth::user()->profile->image)}}" alt="Profile" class="rounded-circle border p-1">
                        @else
                        <img src="{{asset('assets/img/user.png') }}" alt="Profile" class="rounded-circle border p-1">
                        @endif
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                            <span>{{ Auth::user()->email }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        @if(Auth::user()->profile)
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}">
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
                        @endif                         
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
    <button class="d-md-none d-sm-inline-block  navbar-toggler border-0 text-black" type="button"
            data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent"
            aria-expanded="true" aria-label="Toggle navigation">
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </button>

    <div
        class="position-absolute top-100 bg-white w-100 order-lg-1 order-md-2 align-self-center navbar-collapse flex-fill d-lg-none w-100 justify-content-lg-between collapse"
        id="templatemo_main_nav" style="">
        <div class="flex-fill">
            <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="">{{ __('الصيدليات') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="">{{ __('الشركاء') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="">{{ __('التواصل') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="">{{ __('حولنا') }}</a>
                </li>
                <li class="nav-item d-flex d-sm-none d-block my-3">
                    <a class="btn btn-outline-primary text-nowrap p-1"
                       href="{{ route('register') }}">{{ __('انشاء حساب') }}</a>
                </li>
                <li class="nav-item d-flex d-sm-none d-block my-3">
                    <a class="btn btn-outline-success text-nowrap py-1"
                       href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
                </li>
            </ul>
        </div>
    </div>
</header>


<!-- End Header -->


@yield('content')


<!-- Start Footer -->
<footer class="bg-dark" id="tempaltemo_footer">

    <div class="w-100 bg-black py-3">
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
                        <input type="text" class="form-control bg-dark border-light text-light" id="subscribeEmail"
                               placeholder="Email address">
                        <div class="input-group-text btn-success text-white">Subscribe</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center active p-2"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Start Script -->
<script src="{{asset('js/jquery-1.11.0.min.js ') }}"></script>
<script src="{{asset('js/jquery-migrate-1.2.1.min.js ') }}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js ') }}"></script>
<script src="{{asset('js/templatemo.js ') }}"></script>
<script src="{{asset('js/custom.js ') }}"></script>
<script src="{{asset('js/viewAndList.js ') }}"></script>
<!-- End Script -->

@yield('scripts')
</body>

</html>
