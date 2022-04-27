
@extends("layouts.main")
@section('content')

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <section class="vh-100 d-flex align-items-center justify-content-center top-0 bg-primary">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-md-8 text-white">
                    <h1>من نحن</h1>
                    <p>
                       نحن عبارة عن موقع الالكتروني يقدم خدمات متنوعة التي يحتاجه المريض حيث جاءت علاجي كوم من اجل مساعدة المريض بصورة خاصة وتوفير له كافة المتطلبات التي يحتاجه بدون الذهاب الى الصيدلية وطلب العلاج من المنزل.
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('assets/img/about-hero.svg') }}" alt="About Hero">
                </div>
            </div>
        </div>
    </section>
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
                    <div class="h-100 py-5 services-icon-wap shadow ">
                        <div class="h1 text-success text-center "><i class="fa fa-truck fa-lg "></i></div>
                        <h2 class="h5 mt-4 text-center">توصيل</h2>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 pb-5">
                    <div class="h-100 py-5 services-icon-wap shadow">
                        <div class="h1 text-success text-center"><i class="bi bi-credit-card-fill"></i></div>
                        <h2 class="h5 mt-4 text-center">دفع الالكتروني</h2>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 pb-5">
                    <div class="h-100 py-5 services-icon-wap shadow">
                        <div class="h1 text-success text-center"><i class="bi bi-display-fill"></i></div>
                        <h2 class="h5 mt-4 text-center">عروض</h2>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 pb-5">
                    <div class="h-100 py-5 services-icon-wap shadow">
                        <div class="h1 text-success text-center"><i class="bi bi-alarm"></i></div>
                        <h2 class="h5 mt-4 text-center">خدمة على مدار 24 ساعة</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>


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
                            <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="templatemo-slide-brand" data-bs-ride="carousel">
                                <!--Slides-->
                                <div class="carousel-inner product-links-wap" role="listbox">

                                    <!--First slide-->
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="imgs/brand1.jpg" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="imgs/brand2.jpg" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="imgs/brand3.jpg" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="imgs/brand4.jpg" alt="Brand Logo"></a>
                                            </div>

                                        </div>
                                    </div>
                                    <!--End First slide-->

                                    <!--Second slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="imgs/brand5.jpg" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="imgs/brand6.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="imgs/brand7.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="imgs/brand8.png" alt="Brand Logo"></a>
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
        </div>
    </section>
    <!--End Brands-->


 @endsection
