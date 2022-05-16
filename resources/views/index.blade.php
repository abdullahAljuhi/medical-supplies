@extends("layouts.main")
@section('content')
<!-- Start Banner Hero -->
<section class="min-vh-100 d-flex align-items-center justify-content-center top-0 bg-light p-lg-5 ">
    <div id="template-mo-zay-hero-carousel" class="carousel slide h-75 w-100  bg-light" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner bg-light">

            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid top-slider" src="{{asset('img/md/prescription.png') }}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">علاجي كوم </h1>


                                <p>
                                    اطلب الذي تريد من اي مكان وفي اي وقت سوف نوفر عنك الذهاب االى الصيدلية وسوف نوفر لك
                                    العلاج في اسرع وقت وباسهل طريقة
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid top-slider" src="{{asset('img/33.png ') }}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">خدمة دفع الالكتروني</h1>


                                <p>
                                    يوفر موقع علاجي كوم خدمة الدفع الالكتروني التي سوف تسهل عليك الاجراءت االمالية
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid top-slider" src="{{asset('img/22.png') }}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">خدمة توصيل</h1>
                                <p>
                                    يوفر موقع علاجي كوم خدمة توصسيل الى المنازل والاماكن البعيدة
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
</section>
<!-- End Banner Hero -->
<section class="bg-white ads">
    <div class="  p-4">
        <div class="row">
            <div class="col-md-6 col-lg-3 ">
                <div class="mb-5 ">
                    <img class="img-fluid" src="{{asset('img/pro1.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ">
                <div class="mb-5 ">
                    <img class="img-fluid" src="{{asset('img/pro3.jpg ') }}" alt="">
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ">
                <div class="mb-5 ">
                    <img class="img-fluid" src="{{asset('img/pro3.jpg ') }}" alt="">
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ">
                <div class="mb-5 ">
                    <img class="img-fluid" src="{{asset('img/pro3.jpg ') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-light">
    <div class="container pb-5 p-xl-5 p-0">
        <div class="row text-center py-3 p-xl-5 p-0">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">الصيدليات</h1>
                <p>
                    يمكن الطلب من الصيدلية التي تريد وسوف يتم ايصال الطلب الى باب بيتك
                </p>
            </div>

        </div>
        <div class="card-group justify-content-center">
            <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 g-0 g-sm-5 text-center jobs justify-content-center">
                @foreach ($pharmacies as $pharmacy)
                @break($loop->index > 5)
                <div class="col">
                    <div class="card h-100 p-2">
                        @if($pharmacy->image)
                        <img src="{{asset('assets/images/pharmacies/'.$pharmacy->image)}}" alt="pharmacy"
                            class="border-bottom p-4">
                        @else
                        <img src="{{asset('img/phramacy1.png') }}" class="card-img-top py-5 img-card-cus" alt="...">
                        @endif
                        <div class="card-body pb-0">
                            <h5 class="card-title fs-4 text-primary "> {{ $pharmacy->pharmacy_name }}</h5>

                            <p class="card-text fs-5 text-secondary text-center w-100"><i
                                    class="bi bi-geo-alt  text-primary ms-1"></i>
                                {{ $pharmacy->address[0]->governorate->name?? '' }} - {{
                                $pharmacy->address[0]->city->name ??''}} </p>


                            <ul class="text-center footer-icons d-flex justify-content-center mb-0">
                                <li class="list-inline-item text-center">
                                    <a class="text-light text-decoration-none" target="_blank"
                                        href="{{ $pharmacy->contact[0]->facebook ?? ''}}">
                                        <i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                </li>
                                <li class="list-inline-item  text-center">
                                    <a class="text-light text-decoration-none" target="_blank"
                                        href="{{ $pharmacy->contact[0]->instagram ?? 'https://instagram.com/'}}"><i
                                            class="fab fa-instagram fa-lg fa-fw"></i></a>
                                </li>
                                <li class="list-inline-item  text-center">
                                    <a class="text-light text-decoration-none" target="_blank"
                                        href="{{ $pharmacy->contact[0]->twitter ?? 'https://twitter.com/'}}"><i
                                            class="fab fa-twitter fa-lg fa-fw"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer bg-white">
                            <div class="my-2">
                                @guest
                                <a href="{{ route('login') }}" class="btn btn-outline-primary w-100"><span>طلب دواء
                                    </span>
                                    <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i></a>
                                @else
                                <a href="{{ route('order',$pharmacy->id) }}"
                                    class="btn btn-outline-primary w-100"><span>طلب دواء
                                    </span>
                                    <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i></a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <a href="{{ route('morePharmacy') }}" class="btn btn-outline-primary py-2 w-25 rounded fs-5">الاطلاع اكثر <i
                    class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </div>
    </div>
</section>

<!-- Start Featured Product -->
<!-- Start Section -->

<section class="  py-5 bg-white">
    <div class="container">
        <div class="row text-center pt-5 pb-3">
            <div class="row text-center pt-5 pb-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">خدماتنا</h1>
                    <p>
                        تسطيع من خلال علاجي كوم الحصول على العديد من الخدمات والتي تتضمن التالي
                    </p>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 col-lg-3 pb-5  ">
                <div class="h-100 py-5 services-icon-wapp shadow-sm border ">
                    <div class="h1 text-success text-center "><i class="fa fa-truck fa-lg "></i></div>
                    <h2 class="h5 mt-4 text-center">توصيل</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wapp shadow-sm border">
                    <div class="h1 text-success text-center"><i class="bi bi-credit-card-fill"></i></div>
                    <h2 class="h5 mt-4 text-center">دفع الالكتروني</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wapp shadow-sm border">
                    <div class="h1 text-success text-center"><i class="bi bi-display-fill"></i></div>
                    <h2 class="h5 mt-4 text-center">عروض</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wapp shadow-sm border">
                    <div class="h1 text-success text-center"><i class="bi bi-alarm"></i></div>
                    <h2 class="h5 mt-4 text-center">خدمة على مدار 24 ساعة</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Featured Product -->


<!-- Start Brands -->
<section class="bg-light py-5">
    <div class="container-fluid my-4">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">الشركاء</h1>
                <p>الشركاء المميزين لدينا</p>
            </div>
            <div class="col-lg-12 m-auto tempaltemo-carousel">
                <div class="row d-flex flex-row">
                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="prev">
                            <i class="text-light fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <!--End Controls-->

                    <!--Carousel Wrapper-->
                    <div class="col">
                        <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="templatemo-slide-brand"
                            data-bs-ride="carousel">
                            <!--Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                    src="{{asset('img/brand1.jpg') }}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                    src="{{asset('img/brand2.jpg ') }}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                    src="{{asset('img/brand3.jpg ') }}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                    src="{{asset('img/brand4.jpg ') }}" alt="Brand Logo"></a>
                                        </div>

                                    </div>
                                </div>
                                <!--End First slide-->


                                <!--Second slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                    src="{{asset('img/brand5.jpg') }}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                    src="{{asset('img/brand6.png ') }}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                    src="{{asset('img/brand7.png ') }}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                    src="{{asset('img/brand8.png') }}" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End Second slide-->

                            </div>
                            <!--End Slides-->
                        </div>
                    </div>
                    <!--End Carousel Wrapper-->

                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="next">
                            <i class="text-light fas fa-chevron-left"></i>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
        </div>
    </section>
    <!--End Brands-->
    <section class="bg-white ads">
        <div class="  p-4">
            <div class="row">
            @foreach($advertisements as $ads)
                <div class="col-md-6 col-lg-3 ">
                    <div class="mb-5 ">
                        <img class="img-fluid" src="{{asset('assets/images/advs/'.$ads->image) }}" alt="">
                    </div>
                </div>
            @endforeach
                
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')
@auth
<script>
    var notificationsWrapper = $('.dropdown-notifications');
    var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsToggle.find('span[data-count]');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notifications = notificationsWrapper.find('li.scrollable-container');


    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe("order{{  Auth::user()-> id }}");
    // Bind a function to a Event (the full Laravel class)

    channel.bind('App\\Events\\Messages', function(data) {
    //   console.log(data.order.pharmacy_id);
      var existingNotifications = notifications.html();
      var newNotificationHtml = `
        <form action="{{route('order.userBill')}}" method="get">
        <input type="hidden" name='id' value="${data.order.id}">
        <button type="submit"> هناك طلب</button>
        </form>`
        ;
      notifications.html(newNotificationHtml + existingNotifications);
      notificationsCount += 1;
      notificationsCountElem.attr('data-count', notificationsCount);
      notificationsWrapper.find('.notify-count').text(notificationsCount);
      notificationsWrapper.show();
    });
</script>
@endauth

@endsection
