<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/viewAndList.css') }}">
    {{-- fotn awesom  --}}

    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- Costume CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/ar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    {{-- validation image  --}}
    <script src="{{asset('js/validationIamge.js') }}"></script>

    @yield('extra-style')

</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">


    <!-- Main Logo -->
    <div class="d-flex align-items-center justify-content-between">
        <a href="/dashboard" class="logo d-flex align-items-center">
            <img class="m-4" src="{{ asset('assets/img/logo.png') }}" alt="">
            <span class="d-none d-lg-block">علاجي كوم</span>
        </a>
        @auth
            <i class="bi bi-list toggle-sidebar-btn"></i>
        @endauth
    </div>
    <!-- End Logo -->

    <!-- Icons Navigation -->
    <nav class="header-nav me-auto">
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
<<<<<<< HEAD
            @else
            <!-- Notification Nav -->
                <li class="nav-item dropdown dropdown-notifications">
=======
                @else

                @if (Auth::user()->type==2)
                @php
                $q = App\Models\Order::with(['pharmacy'=>function($q){
                return $q->where('user_id',Auth::id());
                }],'user')->where('status',0)->where('is_show','0');

                $orders=$q->limit(6)->get();

                $count=$q->count();
                @endphp
                @endif
                <!-- Notification Nav -->
                    <!-- Notification Nav -->
                    <li class="nav-item dropdown dropdown-notifications">
>>>>>>> d4f6f5634eb19eaa2b854d36e3a4102cf8812915

                        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" data-toggle="dropdown">
                            <i class="bi bi-bell"></i>
    
                            <span class="badge bg-primary badge-number notify-count" data-count="{{ $count??'0' }}">{{
                                $count ??'0' }}</span>
                        </a><!-- End Notification Icon -->
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                            <li class="notification-item scrollable-container notify">
                            </li>
                            @isset($orders)
                            @foreach ($orders as $order )
                            <li class="notification-item scrollable-container">
                                <a href="/pharmacy/order/{{ $order->id }}">
                                     هناك طلب من {{ $order->user->name}}
                                </a>
                            </li>
                            @endforeach
                            <li>
    
                                <hr class="dropdown-divider">
                            </li>
    
                            <li class="dropdown-footer">
                                <a href="{{ route('pharmacy.orders') }}">عرض جميع الطلبات</a>
                            </li>
                            @endisset
                            <li class="notification-item scrollable-container">
                            </li>
    
                        </ul><!-- End Notification Dropdown Items -->
                    </li>
                <!-- End Notification Nav -->

                <!-- Messages Nav -->
                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">0</span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            ليس لديك اي رسائل جديدة
{{--                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">عرض الجميع</span></a>--}}
                        </li>
{{--                        <li>--}}
{{--                            <hr class="dropdown-divider">--}}
{{--                        </li>--}}

{{--                        <li class="dropdown-footer">--}}
{{--                            <a href="#">عرض جميع الرسائل</a>--}}
{{--                        </li>--}}

                    </ul><!-- End Messages Dropdown Items -->

                </li>
                <!-- End Messages Nav -->

                <!-- Profile Nav -->
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        @if(isset(Auth::user()->profile->image))
                            <img src="{{asset('assets/images/users/'.Auth::user()->profile->image)}}" alt="Profile"
                                 class="rounded-circle border p-1">
                        @else
                            <img src="{{asset('assets/img/user.png') }}" alt="Profile"
                                 class="rounded-circle border p-1">
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

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('home') }}">
                                <i class="bi bi-grid"></i>
                                <span>لوحة التحكم</span>
                            </a>
                        </li>

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
                        <li>
                            {{-- if(Auth::user) --}}
                            @if(Auth::user()->type==1)
                                
                            <a class="dropdown-item d-flex align-items-center" href="
                            {{-- {{ route('admin.wallet') }} --}}
                            ">
                                <i class="bi bi-person"></i>
                                ' {{ $admin  = App\Models\User::where('type','1')->first()->wallet->balance; }} '<span>    ريال في محفضتك  </span>
                            </a>
                            @else
                            <a class="dropdown-item d-flex align-items-center" href="
                            {{-- {{ route('pharmacy.wallet') }} --}}
                            ">
                                <i class="bi bi-person"></i>
                                ' {{ $user=App\Models\User::find(Auth::id())->wallet->balance; }} '<span>    ريال في محفضتك  </span>
                            </a>
                            {{-- user.wallet --}}
                            @endif
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

</header>
<!-- End Header -->

@auth
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ route('home') }}">
                    <i class="bi bi-grid"></i>
                    <span>لوحة التحكم</span>
                </a>
            </li><!-- End Dashboard Nav -->

            @if(Auth::user()->type == 1)
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('admin.pharmacies.all') }}">
                        <i class="bi bi-flower1"></i>
                        <span>الصيدليات</span>
                    </a>
                </li><!-- End Users Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('admin.users.index') }}">
                        <i class="bi bi-person"></i>
                        <span>المستخدمين</span>
                    </a>
                </li><!-- End Users Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('admin.orders') }}">
                        <i class="bi bi-cart"></i><span>جميع الطلبات</span>
                    </a>
                </li><!-- End Charts Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#">
                        <i class="bi bi-cash"></i><span>الدفع</span>
                    </a>
                </li><!-- End Charts Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('show.adv') }}">
                        <i class="bi bi-gem"></i><span>اعلانات</span></i>
                    </a>
                </li><!-- End Icons Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('show.adv') }}">
                        <i class="bi bi-gem"></i><span>المحفظة</span></i>
                    </a>
                </li><!-- End Icons Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#orders-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-gear"></i><span>اعدادات</span><i class="bi bi-chevron-down me-auto"></i>
                    </a>
                    <ul id="orders-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li class="px-4">
                            <a href="{{ route('add-state') }}">
                                <i class="bi bi-circle"></i><span>ادارة المحافظات</span>
                            </a>
                        </li>
                        <li class="px-4">
                            <a href="{{ route('add-city') }}">
                                <i class="bi bi-circle"></i><span>ادارة المدن</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Charts Nav -->
            @endif

            @if(Auth::user()->type == 2)
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('pharmacy.orders') }}">
                        <i class="bi bi-cart"></i>
                        <span>جميع الطلبات</span>
                    </a>
                </li><!-- End Users Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#">
                        <i class="bi bi-flower1"></i>
                        <span>الطلبات الجديدة</span>
                    </a>
                </li><!-- End Users Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#">
                        <i class="bi bi-flower1"></i>
                        <span>المحفظة</span>
                    </a>
                </li><!-- End Users Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#">
                        <i class="bi bi-bell"></i>
                        <span>الاشعارات</span>
                    </a>
                </li><!-- End Users Nav -->
            @endif

        </ul>

    </aside>
    <!-- End Sidebar-->
@endauth

<main id="main" class="main">
    <div class="alert alert-success" style="display: none" role="alert" id=pharmcy>

    </div>
    @yield('content')
</main>

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>Jaweb</span></strong>. All Rights Reserved
    </div>
</footer>
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{asset('js/viewAndList.js ') }}"></script>


<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>


<<<<<<< HEAD
@yield('scripts')
=======
    @auth
    @if (Auth::user()->type==2)        
    <script>
        var notificationsWrapper = $('.dropdown-notifications');
        var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
        var notificationsCountElem = notificationsToggle.find('span[data-count]');
        var notificationsCount = parseInt(notificationsCountElem.data('count'));
        var notifications = notificationsWrapper.find('li.scrollable-container.notify');
    
    
        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe("order{{  Auth::user()-> id }}");
        // Bind a function to a Event (the full Laravel class)
     
        channel.bind('App\\Events\\Messages', function(data) {
        //   console.log(data.order.pharmacy_id);
          var existingNotifications = notifications.html();
          var newNotificationHtml = `
            <form action="/pharmacy/order/${data.order.id}" class='n-form' method="get">
            <button type="submit" class='n-form-btn'>  هناك طلب جديد</button>
            </form>`
            ;
          notifications.html(newNotificationHtml + existingNotifications);
          notificationsCount += 1;
          notificationsCountElem.attr('data-count', notificationsCount);
          notificationsWrapper.find('.notify-count').text(notificationsCount);
          notificationsWrapper.show();
        });
    </script>
    @endif
    @if (Auth::user()->type==1)
    <script src="{{('/js/pusherNotifications.js')}}">
    </script>
    @endif
    @endauth
    @yield('scripts')
>>>>>>> d4f6f5634eb19eaa2b854d36e3a4102cf8812915
</body>

</html>
