@extends("layouts.main")
@section('content')

@include('alerts.errors')
@include('alerts.success')
<!--Display Error-->
<!-- @if($errors->any())
    {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
@endif -->



<section class="mt-5 py-3">
    <div class="container  my-3 bg-white shadow">
        <div class="row py-3  px-1">
            <div class="col-lg-1 col-sm-2 links  ">
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
                    <div class="col-lg-6 row align-items-center justify-content-center">
                        <div class="col-sm-6 col-12 my-2">
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
                        </div>
                        <div class="col-sm-6 col-12 my-2">
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
                    <div class="col-lg-6 d-flex border ps-0 mb-3 my-2">
                        <input type="text" class=" border-0 py-1" style="width: 90%;outline:0ch" placeholder="البحث "
                            aria-label="Example text with button addon" aria-describedby="button-addon1" name="name">
                        <button type="submit" name="search" id="" style="width: 10%;border:0;background: transparent;outline:0ch" class="bg-primary text-white" >
                            <i class="bi bi-search"></i>
                        </button>
                    </div>

                    </div>


                </form>
            </div>
        </div>

        <div class="wrapper">

            <div class="view_main container shadow w-100">
                @if(sizeof($pharmacies) == 0)
                    <h1 class="fs-4 py-5 text-center">لا يوجد اي صيدليات متوفرة</h1>
                @endif
                <div class="view_wrap list-view">
                    <div class="mt-0 text-center">
                        @foreach ($pharmacies as $pharmacy)
                            <div class="row  py-2 border-bottom text-content text-black justify-content-center">
                                <div class="col-md-2 col-12  d-flex justify-content-center fw-bold align-self-center fs-5 my-3">
                                    {{ $pharmacy->pharmacy_name??'' }}
                                </div>
                                <div class="col-md-2 col-sm-4 col-3 mb-2 mb-md-0 d-flex justify-content-center  align-self-center">
                                    <i class="bi bi-geo-alt  text-primary ms-3 d-sm-inline-block d-none"></i>
                                    <span>{{$pharmacy->governorate_name ??''}}</span>
                                </div>
                                <div class="col-md-2 col-sm-4 col-3 mb-2 mb-md-0 d-flex justify-content-center  align-self-center">
                                    <i class="bi bi-hospital   text-primary ms-3 d-sm-inline-block d-none"></i>
                                    <span>{{$pharmacy->city_name ??''}}</span>
                                </div>
                                <div class="col-md-3 col-sm-4 col-6 mb-2 mb-md-0 d-flex justify-content-center  align-self-center">
                                    <i class="bi bi-map   text-primary ms-3 d-sm-inline-block d-none"></i>
                                    <span> {{ $pharmacy->street?? '' }}</span>
                                </div>
                                <div class="col-md-2 mb-2 mb-md-0 text-center d-flex justify-content-center fw-bold align-self-center">
                                    @guest
                                        <a href="{{ route('login') }}"
                                           class="btn btn-outline-primary text-nowrap"><span>طلب دواء</span>
                                            <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i></a>
                                    @else
                                        <a href="{{ route('order',$pharmacy->id) }}"
                                           class="btn btn-outline-primary text-nowrap"><span>طلب دواء</span>
                                            <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i></a>
                                    @endguest
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

                <div class="view_wrap grid-view " style="display: none;">
                    <div class="card-group justify-content-center">
                        <div
                            class="row row-cols-1 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 g-0 g-sm-5 text-center jobs justify-content-center w-100">
                            @foreach ($pharmacies as $pharmacy)
                                <div class="col">
                                    <div class="card h-100 px-2">
                                        @if($pharmacy->image)
                                            <img src="{{asset('assets/images/pharmacies/'.$pharmacy->image)}}"
                                                 class="rounded border-bottom"style="height: 250px; object-fit: contain"
                                                 alt="..." >
                                        @else
                                            <img src="{{asset('img/pharmacy.png') }}"
                                                 class="rounded border-bottom"style="height: 250px; object-fit: contain"
                                                 alt="..." >
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
                                                @guest
                                                    <a href="{{ route('login') }}"
                                                       class="btn btn-outline-primary w-100"><span>طلب دواء</span>
                                                        <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i></a>
                                                @else
                                                    <a href="{{ route('order',$pharmacy->id) }}"
                                                       class="btn btn-outline-primary w-100"><span>طلب دواء</span>
                                                        <i class="fa fa-fw fa-cart-arrow-down mr-1 px-3"></i></a>
                                                @endguest
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
            $('#select2').prepend('<option selected value="0">جميع المدن</option>');
        }
    </script>
@endsection

