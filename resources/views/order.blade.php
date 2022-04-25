@extends("layouts.main")
@section('content')
    <div class="container my-5">
        <section class="section profile">
            <div class="row">


                <div class="col-xl-4 ">
                  <div class="card  shadow    bg-body  d-flex justify-content-center align-items-center" style=" padding: 0 0 1rem 0 ; overflow: hidden;border-radius: 1rem;">
                      <div class="row card-img-top w-100 mb-2 h-100 " >
                       <img src="imgs/phramacy6.png" class="card-img-top w-100  card-pharmacy p-0"  alt="...">
                      </div>
                       <!-- strat info  -->
                       <div class="card-body">
                          <h5 class="card-title text-center fw-bold" >صيدلية رضا الوالدين</h5>
                            <p class="card-text ">العنوان : حضرموت -  المكلا - حي الشهيد</p>
                            <div class="text-center  mb-3">
                              <i class="bi bi-telephone-fill"></i>
                              <span>772725220</span>
                            </div>
                            <!-- strat social media  -->
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
                              <li class="list-inline-item     text-center">
                                  <a class="text-light text-decoration-none" target="_blank"
                                     href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                              </li>
                          </ul>
                          <!-- strat social media  -->
                       </div>

                     </div>
                 </div>



              <div class="col-xl-8  ">

                <div class="card p-5 pb-0 shadow h-100" style=" padding: 0 0 0 0 ; overflow: hidden;border-radius: 1rem;">
                  <div class="card-body p-0" >


                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs w-100 p-0 nav-order rounded overflow p-2 border">
                      <li class="nav-item  w-50   d-flex justify-content-center align-items-center ">
                        <button class="nav-link active btn-outline-primary w-100  rounded-left" data-bs-toggle="tab" data-bs-target="#profile-settings">الطلب عن طريق كتابة اسم العلاج</button>
                      </li>

                      <li class="nav-item  w-50   d-flex justify-content-center align-items-center">
                        <button class="nav-link w-100   " data-bs-toggle="tab" data-bs-target="#profile-change-password">الطلب عن طريق الوصفة الطبية</button>
                      </li>

                    </ul>
                    <div class="tab-content p-4">

                      <div class="tab-pane fade pt-3 show active" id="profile-settings">
                        <form>
                          <div class="row mb-3">
                            <label for="currentPassword" class="col-md-12   col-form-label"> قم بكتابة اسم العلاج</label>
                            <div class="col-md-12 ">
                              <input name="name" type="text" class="form-control" id="currentPassword">
                            </div>
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">ارسال الطلب</button>
                          </div>
                        </form>

                      </div>

                      <div class="tab-pane fade pt-3" id="profile-change-password">

                        <form>
                          <div class="row mb-3">
                            <label for="currentPassword" class="col-md-12  col-form-label">صورة الوصفة الطبية او صورة من العلاج   </label>
                            <div class="col-md-12 ">
                              <input name="name" type="file" class="form-control" id="currentPassword">
                            </div>
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary fw-bold">ارسال الطلب</button>
                          </div>

                        </form>


                      </div>

                    </div><!-- End Bordered Tabs -->

                  </div>
                </div>

              </div>
            </div>
          </section>
    </div>




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
  <section class="bg-white ads p-4">
      <div class="  p-4">
      <div class="row">
          <div class="col-md-6 col-lg-3 ">
              <div class="mb-5 ">
                  <img class="img-fluid" src="imgs/pro1.jpg" alt="">
              </div>
          </div>
          <div class="col-md-6 col-lg-3 ">
              <div class="mb-5 ">
                  <img class="img-fluid" src="imgs/pro3.jpg" alt="">
              </div>
          </div>
          <div class="col-md-6 col-lg-3 ">
              <div class="mb-5 ">
                  <img class="img-fluid" src="imgs/pro4.jpg" alt="">
              </div>
          </div>
          <div class="col-md-6 col-lg-3 ">
              <div class="mb-5 ">
                  <img class="img-fluid" src="imgs/pro7.jpg" alt="">
              </div>
          </div>
      </div>
      </div>
  </section>
@endsection
