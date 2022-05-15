@extends("layouts.main")
@section('content')
    <section class="mt-5 py-3 min-vh-100">
        <div class="container  my-3 bg-white shadow">
            <div class="row py-3  px-1">
                <div class="col-md-1 col-sm-2 links  ">
                    <ul class="w-100 h-100">
                        <li data-view="list-view" class="li-list active">
                            <i class="fas fa-th-list"></i>
                        </li>
                        <li data-view="grid-view" class="li-grid">
                            <i class="fas fa-th-large"></i>
                        </li>
                    </ul>
                </div>
                <form action="{{ route('morePharmacy') }}" method="get" class="col-md-11 col-sm-12">
                    <div class="row">
                        <div class="col-md-6 d-flex border ps-0 mb-3 mb-md-0 ">
                            <input type="text" class=" border-0 py-1" style="width: 90%;outline:0ch"
                                   placeholder="البحث "
                                   aria-label="Example text with button addon" aria-describedby="button-addon1"
                                   name="name">
                            <button type="submit" name="search" id=""
                                    style="width: 10%"
                                    class="bg-primary text-white border-0">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                        <div class="col-md-6 d-flex">
                            <select name="governorate" id="select1"
                                    class="form-select select1 form-control mx-2"
                                    aria-label=".form-select-lg example">

                                <option value="0" selected>جميع المحافظات</option>
                                @foreach ($governorates as $governorat)
                                    <option value="{{ $governorat->id }}">
                                        {{ $governorat->name }}
                                    </option>
                                @endforeach
                            </select>
                            <select name="city" id="select2"
                                    class="form-select select2 form-control mx-2"
                                    aria-label=".form-select-lg example">
                                <option value="0" selected>جميع المدن</option>
                                @foreach ($cities as $city)
                                    <option class="city{{ $city->governorate_id }}"
                                            value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                </form>
            </div>
        </div>

        <div class="wrapper">

            <div class="view_main container shadow">
                @if(sizeof($pharmacies) == 0)
                    <h1 class="fs-4 py-5 text-center">لا يوجد اي صيدليات متوفرة</h1>
                @endif
                <div class="view_wrap list-view">
                    <div class="mt-0 text-center">
                        @foreach ($pharmacies as $pharmacy)
                            <div class="row  py-2 border-bottom text-content text-black ">
                                <div
                                    class="col-md-1 col-4 mb-md-0 mb-4 d-flex justify-content-center fw-bold align-self-center fs-5">
                                    {{ $loop->index }}
                                </div>
                                <div
                                    class="col-md-2 col-8  d-flex justify-content-strat fw-bold align-self-center fs-5">
                                    {{ $pharmacy->pharmacy_name??'' }}
                                </div>
                                <div
                                    class="col-md-3  mb-2 mb-md-0   d-flex justify-content-strat fw-bold align-self-center">
                                    <div class="row w-100">
                                        <div class="col-6">
                                            <i class="bi bi-geo-alt  text-primary ms-3"></i>
                                            <span>{{$pharmacy->governorate_name ??''}}</span>
                                        </div>
                                        <div class="col-6">
                                            <i class="bi bi-hospital   text-primary ms-3"></i>
                                            <span>{{$pharmacy->city_name ??''}}</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 mb-2 mb-md-0 d-flex justify-content-strat  align-self-center">
                                    <i class="bi bi-map   text-primary ms-3"></i>
                                    <span> {{ $pharmacy->street?? '' }}</span>
                                </div>
                                <div
                                    class="col-md-2 mb-2 mb-md-0 text-center d-flex justify-content-center fw-bold align-self-center">
                                    <a href="" class="btn btn-outline-primary px-4">
                                        <span style="font-size: 18px">طلب </span>
                                        <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

                <div class="view_wrap grid-view " style="display: none;">
                    <div class="card-group justify-content-center">
                        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 g-5 text-center jobs justify-content-center">
                            @foreach ($pharmacies as $pharmacy)
                                <div class="col">
                                    <div class="card h-100 p-2">
                                        @if($pharmacy->image)
                                            <img src="{{asset('assets/images/pharmacies/'.$pharmacy->image)}}"
                                                 alt="pharmacy"
                                                 class="border-bottom p-md-5">
                                        @else
                                            <img src="{{asset('img/phramacy1.png') }}"
                                                 class="card-img-top py-5 img-card-cus"
                                                 alt="...">
                                        @endif
                                        <div class="card-body pb-0">
                                            <h5 class="card-title fs-4 text-primary "> {{ $pharmacy->pharmacy_name }}</h5>

                                            <p class="card-text fs-5 text-secondary text-center w-100"><i
                                                    class="bi bi-geo-alt  text-primary ms-1"></i>
                                                {{ $pharmacy->governorate_name?? '' }} - {{
                                        $pharmacy->city_name ??''}} </p>

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
                                                <a href="job-details.html" class="btn btn-outline-primary w-100"><span>طلب دواء
                                            </span>
                                                    <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

@endsection

@section('scripts')
    <script>
        $("#select1").change(select);

        function select() {
            if ($(this).data('options') === undefined) {
                /*Taking an array of all options-2 and kind of embedding it on the select1*/
                $(this).data('options', $('#select2 option').clone());
            }
            if ($(this).val() == 0) {
                $('#select2').html($(this).data('options'));
                return;
            }
            var id = $(this).val();
            var options = $(this).data('options').filter('[class=city' + id + ']');
            $('#select2').html(options);
            $('#select2').prepend('<option value="0" selected>جميع المدن</option>');
        }
    </script>
@endsection

