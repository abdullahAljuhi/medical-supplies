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

        <!-- leaflet css  -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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


    <style>
                #map {
            width: 100%;
            height: 100vh;
        }
    </style>

    {{-- fotn awesom --}}

    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- Costume CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/ar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    {{-- validation image --}}
    <script src="{{asset('js/validationIamge.js') }}"></script>
    {{-- pusher js --}}
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('e4b4e21e1f468b8bddf2', {
            cluster: 'mt1'
        });

    </script>


    @yield('extra-style')

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">


        <!-- Main Logo -->
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ Auth::user()->type==1?'/dashboard':'/pharmacy' }}" class="logo d-flex align-items-center">
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
                @else

                @if (Auth::user()->type == 2)

                @php
                if (isset(Auth::user()->pharmacy)) {
                    # code...
                    $pharmacy = App\Models\Pharmacy::where('user_id', Auth::user()->id )->first();
                    
                    $q = App\Models\Order::where('pharmacy_id',$pharmacy->id)->where('status',0)->where('is_show','0');
                    
                    $orders = $q->limit(6)->get() ??'';
                    
                    // echo $order;
                    $count = $q->count();
                    
                }
                @endphp
                @endif

                @if (Auth::user()->type==1)

                <!-- Notification Nav -->
                <li class="nav-item dropdown dropdown-notifications">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" data-toggle="dropdown">
                        <i class="bi bi-bell"></i>

                        <span class="badge bg-primary badge-number notify-count" data-count="{{ $count??'0' }}">{{
                            $count ??'0' }}</span>
                    </a><!-- End Notification Icon -->
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications py-2">
                        <li class="scrollable-container notify">

                        </li>
                        @if(!isset($count) || $count == 0 )
                        <li class="dropdown-header fs-6">
                            ليس لديك اي اشعارات جديدة
                        </li>
                        @else
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a class="text-primary" href="{{ route('admin.orders') }}">عرض جميع الطلبات</a>
                        </li>
                        @endif
                    </ul><!-- End Notification Dropdown Items -->
                </li>
                <!-- End Notification Nav -->
                @elseif(Auth::user()->type==2)
                <li class="nav-item dropdown dropdown-notifications{{ Auth::user()->id }}">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" data-toggle="dropdown">
                        <i class="bi bi-bell"></i>

                        <span class="badge bg-primary badge-number notify-count" data-count="{{ $count??'0' }}">{{
                            $count ??'0' }}</span>
                    </a><!-- End Notification Icon -->
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications py-2">

                        <li class="scrollable-container notify">

                        </li>
                        @isset($orders)
                        @foreach ($orders as $order )
                        <li class="notification-item scrollable-container text-center text-nowrap  py-2">
                            <a href="/pharmacy/order/{{ $order->id }}" class="d-flex align-items-center text-dark">
                                <div class="mx-2">
                                    <p class="fs-6 text-dark">هناك طلب من {{ $order->user->name}}</p>
                                    <p class="d-block">{{\Carbon\Carbon::parse($order->created_at)->diffForHumans()}}
                                    </p>
                                </div>
                                @if(isset($order->user->profile->image))
                                <img src="{{asset('assets/images/users/'.$order->user->profile->image)}}" alt="Profile" class="rounded-circle border p-1" style="width: 35px;
                                            height: 35px;">
                                @else
                                <img src="{{asset('assets/img/user.png') }}" alt="Profile" class="rounded-circle border p-1" style="width: 35px;
                                            height: 35px;">
                                @endif
                            </a>
                        </li>
                        @endforeach
                        @endisset
                        @if(isset($count))
                        @if($count!=0)
                            
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a class="text-primary" href="{{ route('pharmacy.orders') }}">عرض جميع الطلبات</a>
                        </li>
                        @else
                        <li class="dropdown-header fs-6">
                            ليس لديك اي اشعارات جديدة
                        </li>
                        @endif
                        
                        @else
                        <li class="dropdown-header fs-6">
                            ليس لديك اي اشعارات جديدة
                        </li>
                        @endif

                    </ul><!-- End Notification Dropdown Items -->
                </li>
                @endif


                <!-- Profile Nav -->
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        @if(isset(Auth::user()->profile->image))
                        <img src="{{asset('assets/images/users/'.Auth::user()->profile->image)}}" alt="Profile" class="rounded-circle border" style="object-fit: cover; width: 35px;height: 35px; padding: 1px">
                        @elseif(isset(Auth::user()->pharmacy->image))
                        <img src="{{asset('assets/images/pharmacies/'.Auth::user()->pharmacy->image)}}" alt="Profile" class="rounded-circle border" style="object-fit: cover; width: 35px;height: 35px; padding: 1px">
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
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('edit.profile') }}">
                                <i class="bi bi-gear"></i>
                                <span>اعدادات الحساب</span>
                            </a>
                        </li>
                        <li>
                            {{-- if(Auth::user) --}}
                            @if(Auth::user()->type==1)

                            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.wallet') }}">
                                <i class="bi bi-cash-coin"></i><span>المحفظة</span>
                            </a>
                            @else
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('pharmacy.wallet') }}">
                                <i class="bi bi-cash-coin"></i><span>المحفظة</span>
                            </a>
                            @endif
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>هل تحتاج المساعدة ؟</span>
                            </a>
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
                <a class="nav-link collapsed" href="{{ route('show.adv') }}">
                    <i class="bi bi-gem"></i><span>اعلانات</span></i>
                </a>
            </li><!-- End Icons Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.wallet') }}">
                    <i class="bi bi-cash-coin"></i><span>المحفظة</span>
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
                <a class="nav-link collapsed" href="{{ route('pharmacy.wallet') }}">
                    <i class="bi bi-cash-coin"></i><span>المحفظة</span>
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

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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


    @auth
    @if (Auth::user()->type==2)
    <script>
        var notificationsWrapper = $('.dropdown-notifications{{ Auth::user()->id }}');
        var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
        var notificationsCountElem = notificationsToggle.find('span[data-count]');
        var notificationsCount = parseInt(notificationsCountElem.data('count'));
        var notifications = notificationsWrapper.find('li.scrollable-container.notify');


        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe("order{{  Auth::user()-> id }}");
        // Bind a function to a Event (the full Laravel class)

        channel.bind('App\\Events\\Messages', function(data) {

            var existingNotifications = notifications.html();
            var newNotificationHtml =
                `<a href="/pharmacy/order/${data.order.id}" class="d-flex align-items-center text-dark">
                                    <div class="mx-2">
                                        <p class="fs-6 text-dark my-1"> ${data.message} ${data.user.name}</p>
                                        <p class="d-block text-center" style="font-size:12px ; text-align:center";> الان </p>
                                    </div>
                                    <img src="{{asset('assets/img/user.png') }}" alt="Profile"class="rounded-circle border p-1"
                                    style="width: 35px;height: 35px;">
                            </a>`
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
</body>

</html>
