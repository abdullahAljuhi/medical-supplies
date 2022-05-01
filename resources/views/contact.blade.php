@extends("layouts.main")
@section('content')


    <!-- Modal -->

    <section class="min-vh-100 pt-5 d-flex align-items-center justify-content-center top-0 bg-light">
        <!-- Start Content Page -->
        <div class="w-100 bg-light py-5">
            <div class="container">
                <div class="col-md text-center">
                    <h1 class="h1">تواصل معنا</h1>
                    <div class="row">

                        <div class="col-md-6 col-lg-4 pb-5  ">
                            <div class="h-100 py-5 services-icon-wap shadow ">
                                <div class="h1 text-success text-center "><i class="bi bi-telephone-fill"></i></div>
                                <h2 class="h5 mt-4 text-center">الهاتف</h2>
                                <p>
                                    772725220
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 pb-5">
                            <div class="h-100 py-5 services-icon-wap shadow">
                                <div class="h1 text-success text-center"><i class="bi bi-geo-alt-fill"></i></div>
                                <h2 class="h5 mt-4 text-center">العنوان</h2>
                                <p>
                                    اليمن / حضرموت /المكلا
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 pb-5">
                            <div class="h-100 py-5 services-icon-wap shadow">
                                <div class="h1 text-success text-center"><i class="bi bi-envelope-fill"></i></div>
                                <h2 class="h5 mt-4 text-center">البريد الالكتروني</h2>
                                <p>
                                    MedicalSublies@gmail.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <div class="row py-3">
                    <form class="col-md m-auto" method="post" role="form">
                        <div class="row">
                            <div class="form-group col-md  mb-3">
                                <label for="name">الاسم</label>
                                <input type="text" class="form-control mt-1" id="name" name="name" placeholder="قم بكتابة اسم المستخدم">
                            </div>
                            <div class="form-group  mb-3">
                                <label for="email">البريد الالكتروني</label>
                                <input type="email" class="form-control mt-1" id="email" name="email" placeholder="قم بكتابة البريد الالكتروني">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="subject">الموضوع</label>
                            <input type="text" class="form-control mt-1" id="subject" name="subject" placeholder="قم بكتابة عنوان الرسالة">
                        </div>
                        <div class="mb-3">
                            <label for="message">الرسال</label>
                            <textarea class="form-control mt-1" id="message" name="message" placeholder="قم بكتابة الرسالة مع تحديد المشكلة " rows="8"></textarea>
                        </div>
                        <div class="row">
                            <div class="col text-end mt-2">
                                <button type="submit" class="btn btn-success btn-lg px-3">ارسال</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    <!-- End Contact -->




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
