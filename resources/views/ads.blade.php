@extends( 'layouts.app')
@section('title', 'ادارة الاعلانات')
@section('content')

    <!-- Page Title -->
    <div class="pagetitle">
        <h1>ادارة الاعلانات</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.blade.php">الرائيسية</a></li>
                <li class="breadcrumb-item active">الاعلانات</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section profile min-vh-100 overflow-hidden">
        <div class="row">
            <div class="col-md-1 col-sm-2 links  ">
                <ul class="w-100 h-100">
                    <li data-view="list-view" class="li-list active">
                    <i class="fas fa-th-list"></i>
                    </li>
                    <li data-view="grid-view" class="li-grid">
                    <i class="fas fa-th-large" ></i>
                    </li>
                </ul>
            </div>
            <div class="col-md-5 col-sm-12 mb-2">
                <div class="input-group  form-control ">
                    <input type="text" class=" border-0" style="width: 95%;outline:0ch" placeholder="البحث " aria-label="Example text with button addon" aria-describedby="button-addon1">
                    <i class="bi bi-search" style="width: 5%"></i>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-6">
                        <select class="form-select form-control p-2 pe-5" aria-label=".form-select-lg example">
                            <option selected>قم باختيار احد المحافظات</option>
                            <option value="1">حضرموت</option>
                            <option value="2">صنعاء</option>
                            <option value="3">عدن</option>
                         </select>
                    </div>
                    <div class="col-6">
                        <select class="form-select form-control p-2 pe-5" aria-label=".form-select-lg example">

                            <option selected>قم باختيار احد المدن</option>
                            <option value="1">المكلا</option>
                            <option value="2">الديس</option>
                            <option value="3">باجعمان</option>

                          </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="view_main container shadow ">
                <div class="view_wrap list-view" style="display: block;">
                    <div   class="row  py-2 border-bottom text-content text-black ">
                        <div class="col-md-1 col-4 mb-md-0 mb-4 d-flex justify-content-center  align-self-center ">الرقم
                        </div>
                        <div class="col-md-2 col-8   ">
                        اسم الشركة  
                        </div>
                        <div class="col-md-4  mb-2 mb-md-0   d-flex justify-content-strat fw-bold align-self-center">
                            <div class="row w-100">
                                <div class="col-6">  
                                    <span >تاريخ البد</span>
                                </div>
                                <div class="col-6">
                                    <span >تاريخ الانتهاء</span>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3 mb-2 mb-md-0 d-flex justify-content-strat  align-self-center">
                            <span >رابط الانتقال</span>
                        </div>
                        <div class="col-md-2 mb-2 mb-md-0 text-center d-flex justify-content-center fw-bold align-self-center">                          
                            <span style="font-size: 18px">العمليات</span>
                        </div>
                    </div>
                    <div class="mt-2 bg-white ">
                        <a href="" class="row  py-2 border-bottom text-content text-black ">
                            <div class="col-md-1 col-4 mb-md-0 mb-4 d-flex justify-content-center  align-self-center fs-5"> 1
                            </div>
                            <div class="col-md-2 col-8  d-flex justify-content-strat fw-bold align-self-center ">
                                شركة قوقل
                            </div>
                            <div class="col-md-4  mb-2 mb-md-0   d-flex justify-content-strat  align-self-center">
                                <div class="row w-100">
                                    <div class="col-6">  
                                        <span >2022/2/2</span>
                                    </div>
                                    <div class="col-6">
                                        <span >2022/2/30</span>
                                    </div>
    
                                </div>
                            </div>
                            <div class="col-md-3 mb-2 mb-md-0 d-flex justify-content-strat  align-self-center">
                                <span >www.googleads.com</span>
                            </div>
                            <div class="col-md-2 mb-2 mb-md-0 text-center d-flex justify-content-center fw-bold align-self-center">
                                <button type="button" class="btn btn-outline-primary px-4">
                                <span style="font-size: 18px">طلب  </span>
                                    <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i>
                                </button>
                            </div>
                        </a>
                    </div>
    
                </div>
    
                <div class="view_wrap grid-view " style="display: none;">
    
                    <div class="card-group p-lg-5">
                        <div class="row row-cols-1 row-cols-md-3 g-5 text-center jobs">
                            <div class="col">
                                <div class="card h-100 p-2">
                                    <img src="{{asset('img/phramacy1.png') }}" class="card-img-top py-5 img-card-cus" alt="...">
                                    <div class="card-body pb-0">
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
                                    <div class="card-footer bg-white">
                                        <div class="my-2">
                                            <a href="job-details.html" class="btn btn-outline-primary w-100"><span>طلب دواء  </span>
                                                <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100 p-2">
                                    <img src="{{asset('img/phramacy1.png') }}" class="card-img-top py-5 img-card-cus" alt="...">
                                    <div class="card-body pb-0">
                                        <h5 class="card-title fs-4 text-primary">صيدلية رضا الوالدين</h5>
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
                                    <div class="card-footer bg-white">
                                        <div class="my-2">
                                            <a href="job-details.html" class="btn btn-outline-primary w-100"><span>طلب دواء  </span>
                                                <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100 p-2">
                                    <img src="{{asset('img/phramacy1.png') }}" class="card-img-top py-5 img-card-cus" alt="...">
                                    <div class="card-body pb-0">
                                        <h5 class="card-title fs-4 text-primary">صيدلية رضا الوالدين</h5>
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
                                    <div class="card-footer bg-white">
                                        <div class="my-2">
                                            <a href="job-details.html" class="btn btn-outline-primary w-100"><span>طلب دواء  </span>
                                                <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100 p-2">
                                    <img src="{{asset('img/phramacy1.png') }}" class="card-img-top py-5 img-card-cus" alt="...">
                                    <div class="card-body pb-0">
                                        <h5 class="card-title fs-4 text-primary">صيدلية رضا الوالدين</h5>
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
                                    <div class="card-footer bg-white">
                                        <div class="my-2">
                                            <a href="job-details.html" class="btn btn-outline-primary w-100"><span>طلب دواء  </span>
                                                <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100 p-2">
                                    <img src="{{asset('img/phramacy1.png') }}" class="card-img-top py-5 img-card-cus" alt="...">
                                    <div class="card-body pb-0">
                                        <h5 class="card-title fs-4 text-primary">صيدلية رضا الوالدين</h5>
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
                                    <div class="card-footer bg-white">
                                        <div class="my-2">
                                            <a href="job-details.html" class="btn btn-outline-primary w-100"><span>طلب دواء  </span>
                                                <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100 p-2">
                                    <img src="{{asset('img/phramacy1.png') }}" class="card-img-top py-5 img-card-cus" alt="...">
                                    <div class="card-body pb-0">
                                        <h5 class="card-title fs-3 text-primary"></h5>
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
                                    <div class="card-footer bg-white">
                                        <div class="my-2">
                                            <a href="job-details.html" class="btn btn-outline-primary w-100"> 
                                                <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </section>

    <script>
        imgInp = document.getElementById('imgInp');
        blah = document.getElementById('blah');

        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
