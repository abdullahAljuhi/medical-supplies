@extends('layouts.app')
@section('title', 'طلب جديد')
@section('content')
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>كشف عرض الاسعار</h1>
        <nav>
            <ol class="breadcrumb">
{{--                <li class="breadcrumb-item"><a href="/home">لوحة التحكم</a></li>--}}
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    @include('alerts.errors')
    @include('alerts.success')
    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-title pb-0">
                        <div class="row mb-2">
                            <div class="col-md-4 col-sm-12 mb-2">
                                <p class="fs-5 py-0 my-0  mx-3">رقم الطلب :
                                    {{ $order->id }}
                                </p>
                            </div>
                            <div class="col-md-8 col-sm-12 mb-2">
                                <p class="fs-5 py-0 my-0  mx-3"> اسم المستخدم :
                                    {{ $order->user['name'] }}
                                </p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 col-sm-12 mb-2">
                                <p class="fs-5 py-0 my-0  mx-3"> تاريخ الطلب :
                                    {{ $order->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <div class="col-md-8 col-sm-12 mb-2">
                                <p class="fs-5 py-0 my-0  mx-3"> عنوان التوصيل :
                                    {{ $order->address }}
                                </p>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <form method="post" action="{{ route('order.store',$order->id ) }}">
                                @csrf
                                <div class="row mb-2">
                                    @foreach ($products as $product)
                                        @if($order->type == 1)
                                            <div class="col-md-4 col-3 col-12 mb-2 border-bottom pb-2">
                                                <div class="row my-2 text-center">
                                                    <div class="col-12">صورة العلاج</div>
                                                </div>
                                                <img src="{{asset('assets/images/orders/'.$product['product_name'])}}"
                                                     alt="" class="w-100 border myImg" srcset="" style=";height:150px">
                                                <div class="row my-2">
                                                    <div class="col-8">الكمية :</div>
                                                    <div class="col-4">
                                                        <label for="name">{{ $product['quantity'] }} </label>
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="col-3">السعر :</div>
                                                    <div class="col-9">
                                                        <input type="text" name="prices[]" class="form-control col-6"
                                                               id="name" required
                                                               placeholder="يرجى ادخال سعر هذا المنتج">
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="col-3">موجود</div>
                                                    <div class="col-9">
                                                        <select name="found[]" id="select3"
                                                                class="form-select select1 form-control px-2 mx-1 pe-5"
                                                                aria-label=".form-select-lg example">
                                                            <option value="1" selected> موجود</option>
                                                            <option value="0"> غير موجود</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row mb-2   fw-bold">
                                                <div class="col-md-4 col-6 mb-2 mt-3 px-0">
                                                    <div class="col-md-2 col-12 mb-2 fw-bold text-nowrap w-100 border-bottom">
                                                        <label for="name" class=" fw-bold my-2">أسم المنتج</label>
                                                    </div>
                                                    <p class="my-3">{{ $product['product_name'] }} </p>
                                                </div>
                                                <div class="col-md-2 col-6 mb-2  mt-3 px-0">
                                                    <div class="col-md-2 col-12 mb-2 fw-bold text-nowrap w-100 border-bottom">
                                                        <label for="name" class="fw-bold my-2">الكمية</label>
                                                    </div>
                                                    <p class="my-3">{{ $product['quantity'] }}</p>
                                                </div>
                                                <div class="col-md-3  col-6 mb-2  mt-3 px-0">
                                                    <div class="col-md-2 col-12 mb-2 fw-bold text-nowrap w-100 border-bottom">
                                                        <p class="fw-bold my-2">سعر المنتج</p>
                                                    </div>
                                                    <input type="text" name="prices[]" class="my-3 form-control col-6"
                                                           id="name" required placeholder="يرجى ادخال سعر هذا المنتج">
                                                </div>
                                                <div class="col-md-3 col-6 mb-2  mt-3 px-0">
                                                    <div class="col-md-2 col-12 mb-2 fw-bold text-nowrap w-100 border-bottom">
                                                        <label for="name" class="my-2">حالة التوفر</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <select name="found[]" id="select3"
                                                                class="form-select w-100 my-3 select1 form-control px-2 mx-1 pe-5"
                                                                aria-label=".form-select-lg example">
                                                            <option value="1" selected> موجود</option>
                                                            <option value="0"> غير موجود</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        @endif
                                    @endforeach
                                </div>


                                <div class="row">
                                    <div class="col-md-2 col-12 mb-2 border-1 fw-bold">
                                        <label for="name">سعر التوصيل</label>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <input type="text" name="delivery_price" class="form-control w-100" id="name"
                                               required placeholder=" ادخال سعر التوصيل ">
                                    </div>
                                </div>
                                <hr>
                                <div class="tab-pane fade show active profile-overview mt-3 row" id="profile-overview">
                                    <button type="submit" class="btn btn-primary px-3 col-md-2 col-sm-12 mb-2">ارسال
                                    </button>
                                    <a href="{{ route('pharmacy.order.notFond',$order->id) }}"
                                       class="btn btn-danger px-3 col-md-2 col-sm-12   mx-sm-2 mb-2">رفض الطلب</a>
                                </div>
                            </form>
                        </div>
                    </div><!-- End Bordered Tabs -->
                </div>
            </div>
        </div>
        </div>
    </section>

    <div id="myModal" class="modal">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header py-0">
                    <button type="button" class="btn-close close fs-1" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img class="modal-content" id="img01">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        // Get the modal
        var modal = $("#myModal");
        var modalImg = modal.find('.modal-content');
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = $(".myImg");
        var captionBox = $("#caption");

        img.click(function () {
            modalImg.attr('src', $(this).attr('src'));
            captionBox.text($(this).attr('alt'));
            modal.show();
        });


        // Get the elements that closes the modal
        var modalCloser = $(".close");

        // When the user clicks on the close element, close the modal
        modalCloser.click(function () {
            modal.hide();
        });
    </script>
@endsection
