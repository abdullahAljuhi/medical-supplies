@extends("layouts.main")
@section('content')
    <div class="container  mt-5 mb-0 pt-5">
        <section class="section   profile">
            <div class="row">


                <div class="col-xl-4 ">
                  <div class="card  shadow bg-body  d-flex justify-content-center align-items-center" style=" padding: 0 0 1rem 0 ; overflow: hidden;border-radius: 1rem;">
                      <div class="row card-img-top w-100 mb-2 h-100 " >
                       <img src="{{ asset('img/phramacy5.png') }}" class="card-img-top w-100 img-card-cus card-pharmacy p-0"  alt="...">
                      </div>
                       <!-- strat info  -->
                       <div class="card-body pb-2">
                        <h5 class="card-title fs-4 text-primary ">صيدلية رضا الوالدين</h5>
                        <p class="card-text fs-5 text-secondary text-center w-100"><i class="bi bi-geo-alt  text-primary ms-1"></i> حضرموت -  المكلا </p>

                        <ul class="text-center footer-icons d-flex justify-content-center mb-0">
                            <li class="list-inline-item text-center">
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


                     </div>
                 </div>



              <div class="col-xl-8  ">

                <div class=" p-5  shadow  cust-card" style="margin-bottom: 0px; overflow: hidden;border-radius: 1rem;">
                  <div class="card-body p-0" >


                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs w-100 p-0 nav-order rounded overflow p-2 border">
                      <li class="nav-item  w-50   d-flex justify-content-center align-items-center ">
                        <button class="nav-link active btn-outline-primary w-100  rounded-left" data-bs-toggle="tab" data-bs-target="#profile-settings">الطلب عن طريق اسم العلاج</button>
                      </li>

                      <li class="nav-item  w-50   d-flex justify-content-center align-items-center">
                        <button class="nav-link w-100   " data-bs-toggle="tab" data-bs-target="#profile-change-password">الطلب عن طريق الوصفة الطبية</button>
                      </li>

                    </ul>
                    <div class="tab-content p-4 pt-1">

                      <div class="tab-pane fade pt- show active" id="profile-settings">
                        <form>
                          <div class="row mb-3">
                            <label for="name" class="col-md-12 col-form-label"> قم بكتابة اسم العلاج</label>
                            <div class="col-md-12 mb-3">
                              <input name="name" type="text" class="form-control" id="name" placeholder="قم بكتابة اسم العلاج مثل بندول او فوار..." id="currentPassword">
                            </div>
                            <div class="col-md-12 ">
                                <select class="form-select form-control p-2 pe-5" aria-label=".form-select-lg example">
                                    <option selected>   طلب  لمرة واحدة فقط</option>
                                    <option value="1"> طلب كل اسبوع</option>
                                    <option value="2"> طلب كل اسبوعين</option>
                                    <option value="2"> طلب كل 3 اسابيع</option>
                                    <option value="2"> طلب كل شهر</option>
                                 </select>
                             </div>
                             
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">ارسال الطلب</button>
                          </div>
                        </form>

                      </div>

                      <div class="tab-pane fade pt-0" id="profile-change-password">

                        <form>
                          <div class="row mb-3">
                            <label for="phote" class="col-md-12  col-form-label">صورة الوصفة الطبية او صورة من العلاج   </label>
                            <div class="col-md-12 mb-3">
                              <input name="phote" type="file" class="form-control" id="phote">
                            </div>
                            <div class="col-md-12 ">
                                <select class="form-select form-control p-2 pe-5" aria-label=".form-select-lg example">
                                    <option selected>   طلب  لمرة واحدة فقط</option>
                                    <option value="1"> طلب كل اسبوع</option>
                                    <option value="2"> طلب كل اسبوعين</option>
                                    <option value="2"> طلب كل 3 اسابيع</option>
                                    <option value="2"> طلب كل شهر</option>
                                 </select>
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
