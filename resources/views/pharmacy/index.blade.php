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



    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">



            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">All</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">Men's</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none" href="#">Women's</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 pb-4">
                        <div class="d-flex">
                            <select class="form-control">
                                <option>Featured</option>
                                <option>A to Z</option>
                                <option>Item</option>
                            </select>
                        </div>
                    </div>
                </div>
               <div class="row">

                    <div class="col-12 col-md-4 my-2">
                        <div class="card  shadow  mb-5 bg-body  d-flex justify-content-center align-items-center" style=" padding: 0 0 1rem 0 ; overflow: hidden;border-radius: 1rem;">
                            <div class="row card-img-top w-100 mb-2 h-100 " >
                                <img src="imgs/phramacy1.png" class="card-img-top w-100  card-pharmacy-shop    p-0"  alt="...">
                                </div>
                                <!-- strat info  -->
                                <div class="card-body">
                                <h5 class="card-title text-center fw-bold" >صيدلية رضا الوالدين</h5>
                                <p class="card-text text-center ">العنوان : حضرموت -  المكلا - حي الشهيد
                                    <br>
                                    امام بقالة الملتقى
                                </p>

                                <!-- strat social media  -->
                                <ul class=" text-center footer-icons d-flex ">
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i
                                                class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                    </li>
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank"
                                            href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                                    </li>
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i
                                                class="fab fa-twitter fa-lg fa-fw"></i></a>
                                    </li>
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank"
                                            href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                                    </li>
                                </ul>
                                <!-- strat social media  -->
                            </div>
                          <a href="#" class="btn btn-primary fw-bold card-title w-75 rounded mb-4 " >
                                <span>طلب دواء  </span>
                                <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i>
                               </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 my-2">
                        <div class="card  shadow  mb-5 bg-body  d-flex justify-content-center align-items-center" style=" padding: 0 0 1rem 0 ; overflow: hidden;border-radius: 1rem;">
                            <div class="row card-img-top w-100 mb-2 h-100 " >
                                <img src="imgs/phramacy1.png" class="card-img-top w-100  card-pharmacy-shop    p-0"  alt="...">
                                </div>
                                <!-- strat info  -->
                                <div class="card-body">
                                <h5 class="card-title text-center fw-bold" >صيدلية رضا الوالدين</h5>
                                <p class="card-text text-center ">العنوان : حضرموت -  المكلا - حي الشهيد
                                    <br>
                                    امام بقالة الملتقى
                                </p>

                                <!-- strat social media  -->
                                <ul class=" text-center footer-icons d-flex ">
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i
                                                class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                    </li>
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank"
                                            href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                                    </li>
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i
                                                class="fab fa-twitter fa-lg fa-fw"></i></a>
                                    </li>
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank"
                                            href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                                    </li>
                                </ul>
                                <!-- strat social media  -->
                            </div>
                          <a href="#" class="btn btn-primary fw-bold card-title w-75 rounded mb-4 " >
                                <span>طلب دواء  </span>
                                <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i>
                               </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 my-2">
                        <div class="card  shadow  mb-5 bg-body  d-flex justify-content-center align-items-center" style=" padding: 0 0 1rem 0 ; overflow: hidden;border-radius: 1rem;">
                            <div class="row card-img-top w-100 mb-2 h-100 " >
                                <img src="imgs/phramacy1.png" class="card-img-top w-100  card-pharmacy-shop    p-0"  alt="...">
                                </div>
                                <!-- strat info  -->
                                <div class="card-body">
                                <h5 class="card-title text-center fw-bold" >صيدلية رضا الوالدين</h5>
                                <p class="card-text text-center ">العنوان : حضرموت -  المكلا - حي الشهيد
                                    <br>
                                    امام بقالة الملتقى
                                </p>

                                <!-- strat social media  -->
                                <ul class=" text-center footer-icons d-flex ">
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i
                                                class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                    </li>
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank"
                                            href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                                    </li>
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i
                                                class="fab fa-twitter fa-lg fa-fw"></i></a>
                                    </li>
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank"
                                            href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                                    </li>
                                </ul>
                                <!-- strat social media  -->
                            </div>
                          <a href="#" class="btn btn-primary fw-bold card-title w-75 rounded mb-4 " >
                                <span>طلب دواء  </span>
                                <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i>
                               </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 my-2">
                        <div class="card  shadow  mb-5 bg-body  d-flex justify-content-center align-items-center" style=" padding: 0 0 1rem 0 ; overflow: hidden;border-radius: 1rem;">
                            <div class="row card-img-top w-100 mb-2 h-100 " >
                                <img src="imgs/phramacy1.png" class="card-img-top w-100  card-pharmacy-shop    p-0"  alt="...">
                                </div>
                                <!-- strat info  -->
                                <div class="card-body">
                                <h5 class="card-title text-center fw-bold" >صيدلية رضا الوالدين</h5>
                                <p class="card-text text-center ">العنوان : حضرموت -  المكلا - حي الشهيد
                                    <br>
                                    امام بقالة الملتقى
                                </p>

                                <!-- strat social media  -->
                                <ul class=" text-center footer-icons d-flex ">
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i
                                                class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                    </li>
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank"
                                            href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                                    </li>
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i
                                                class="fab fa-twitter fa-lg fa-fw"></i></a>
                                    </li>
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank"
                                            href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                                    </li>
                                </ul>
                                <!-- strat social media  -->
                            </div>
                          <a href="#" class="btn btn-primary fw-bold card-title w-75 rounded mb-4 " >
                                <span>طلب دواء  </span>
                                <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i>
                               </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 my-2">
                        <div class="card  shadow  mb-5 bg-body  d-flex justify-content-center align-items-center" style=" padding: 0 0 1rem 0 ; overflow: hidden;border-radius: 1rem;">
                            <div class="row card-img-top w-100 mb-2 h-100 " >
                                <img src="imgs/phramacy1.png" class="card-img-top w-100  card-pharmacy-shop    p-0"  alt="...">
                                </div>
                                <!-- strat info  -->
                                <div class="card-body">
                                <h5 class="card-title text-center fw-bold" >صيدلية رضا الوالدين</h5>
                                <p class="card-text text-center ">العنوان : حضرموت -  المكلا - حي الشهيد
                                    <br>
                                    امام بقالة الملتقى
                                </p>

                                <!-- strat social media  -->
                                <ul class=" text-center footer-icons d-flex ">
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i
                                                class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                    </li>
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank"
                                            href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                                    </li>
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i
                                                class="fab fa-twitter fa-lg fa-fw"></i></a>
                                    </li>
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank"
                                            href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                                    </li>
                                </ul>
                                <!-- strat social media  -->
                            </div>
                          <a href="#" class="btn btn-primary fw-bold card-title w-75 rounded mb-4 " >
                                <span>طلب دواء  </span>
                                <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i>
                               </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 my-2">
                        <div class="card  shadow  mb-5 bg-body  d-flex justify-content-center align-items-center" style=" padding: 0 0 1rem 0 ; overflow: hidden;border-radius: 1rem;">
                            <div class="row card-img-top w-100 mb-2 h-100 " >
                                <img src="imgs/phramacy1.png" class="card-img-top w-100  card-pharmacy-shop    p-0"  alt="...">
                                </div>
                                <!-- strat info  -->
                                <div class="card-body">
                                <h5 class="card-title text-center fw-bold" >صيدلية رضا الوالدين</h5>
                                <p class="card-text text-center ">العنوان : حضرموت -  المكلا - حي الشهيد
                                    <br>
                                    امام بقالة الملتقى
                                </p>

                                <!-- strat social media  -->
                                <ul class=" text-center footer-icons d-flex ">
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i
                                                class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                    </li>
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank"
                                            href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                                    </li>
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i
                                                class="fab fa-twitter fa-lg fa-fw"></i></a>
                                    </li>
                                    <li class="list-inline-item border border-light rounded-circle text-center">
                                        <a class="text-light text-decoration-none" target="_blank"
                                            href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                                    </li>
                                </ul>
                                <!-- strat social media  -->
                            </div>
                          <a href="#" class="btn btn-primary fw-bold card-title w-75 rounded mb-4 " >
                                <span>طلب دواء  </span>
                                <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i>
                               </a>
                        </div>
                    </div>
               </div>
                <div div="row">
                    <ul class="pagination pagination-lg justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">>></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- End Content -->

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
