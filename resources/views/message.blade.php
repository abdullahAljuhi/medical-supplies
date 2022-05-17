@extends("layouts.main")
@section('content')

<!--Display Error-->
<!-- @if($errors->any())
    {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
@endif -->



    <div class="container  my-5  pt-5">
        <section class="section   profile">
            <div class="row">


                <div class="col-xl-4 ">
                    <div class="card  shadow bg-body  d-flex justify-content-center align-items-center" style=" padding: 0 0 1rem 0 ; overflow: hidden;border-radius: 1rem;">
                        <div class="row card-img-top w-100 mb-2 h-100 " >
                         <img src="{{ asset('img/phramacy5.png') }}" class="card-img-top w-100 img-card-cus card-pharmacy p-0"  alt="...">
                        </div>
                         <!-- strat info  -->
                         <div class="card-body pb-2">
                          <h5 class="card-title fs-4 text-primary text-center">صيدلية ماهر </h5>
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
  
                        <div class="row  w-100 ">
                            <div class="col-12 text-center fs-4 fw-bold text-primary">تم ارسال الطلب بنجاح
                            </div>
                            <div class="col-12 mt-3 fs-5 text-center">
                                سوف يتم ارسال اشعار في حالة تم التأكيد على الطلب او تم رفضه 
                            </div>
                            <a href="/" class="col-12 mt-3 fs-5 text-center">
                                اضغط هنا من اجل  متابعة الطلب
                            </a>
                        </div>
                       
                      <div class="tab-content p-4 py-1">
  
                         
                       
  
                      </div> 
  
                    </div>
                  </div>
  
                </div>
              </div>
          </section>
    </div>

 @endsection
