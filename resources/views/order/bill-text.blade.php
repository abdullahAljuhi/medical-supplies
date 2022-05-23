{{-- @if(Auth::user()->type != 0)
{{ $app='layouts.app' }}
@else
{{ $app='layouts.main' }}
@endif --}}
@extends(Auth::user()->type == 0 ? 'layouts.main' : 'layouts.app')

{{-- @extends($app) --}}
@section('title', 'طلب جديد')
@section('content')
    <!-- Page Title -->
    <div class="pagetitle mt-5 container">
        <h1>كشف عرض الاسعار</h1>
        <nav>
            <ol class="breadcrumb">
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section profile container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    @if($order->status==4)

                        <div class="tab-pane fade show active mt-3 row" id="profile-overview">
                            هذا الطلب تم الغاءه
                        </div>
                    @endif
                    <div class="card-title pb-0 mb-0">
                        <div class="row mb-2">
                            <div class="col-md-4 col-sm-12 mb-2">
                                <p class="fs-5 py-0 my-0  mx-3">رقم الطلب :
                                    {{ $order->id }}
                                </p>
                            </div>
                            <div class="col-md-8 col-sm-12 mb-2" >
                                <p class="fs-5 py-0 my-0  mx-3">  اسم الصيدلية :
                                    {{ $order->pharmacy->pharmacy_name }}
                                </p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 col-sm-12 mb-2">
                                <p class="fs-5 py-0 my-0  mx-3">    تاريخ الطلب :
                                    {{ $order->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <div class="col-md-8 col-sm-12 mb-2">
                                <p class="fs-5 py-0 my-0  mx-3">   عنوان التوصيل :
                                    {{ $order->address }}
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="card-body p-0">
                        <div class="tab-content">
                            <div>
                                <div class="card-body p-0">
                                    <div class="table-responsive  pb-3 px-3">
                                        <table class="table border ">
                                            <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">رقم</th>
                                                <th class="border-0">اسم المنتج</th>
                                                <th class="border-0">سعر المنتج</th>
                                                <th class="border-0">كمية المنتج</th>
                                                <th class="border-0">تواجد العلاج</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($products)
                                            @foreach ($products as $product )
                                                {{-- {{$product  }} --}}
                                                @if($order->type == 1)
                                                    <tr>
                                                        <td>{{ $loop->index +1 }}</td>
                                                        <td>
                                                            <img src="{{asset('assets/images/orders/'.$product['product_name'])}}" alt="" class=" border" srcset="" style=";height:50px;width:50px">
                                                        </td>
                                                        <td>{{ $product['unit_amount']??'' }} </td>
                                                        <td>{{ $product['quantity'] }} </td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td>{{ $loop->index }}</td>
                                                        <td>{{ $product['product_name'] }}</td>
                                                        <td>{{ $product['unit_amount']??'' }} </td>
                                                        <td>{{ $product['quantity'] }} </td>
                                                        <th >
                                                            @if (isset($product['found']))
                                                            {{ $product['found']==1?'موجود':'غير موجود' }}
                                                            @else
                                                            غير موجود
                                                            @endif
                                                        </th>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            <tr>
                                                <td>#</td>
                                                <td>سعر  التوصيل</td>
                                                <td colspan="2">{{ $order->delivery_price }} </td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td  colspan="2">الاجمالي</td>
                                                <td class="fw-bold">{{ $order->total_price }}</td>
                                            </tr>

                                            </tfoot>
                                            @endisset
                                        </table>
                                        @if(Auth::user()->type == 0)
                                        @if($order->status < 3)

                                        <form action="{{ route('test') }}" method="get" class="overflow-hidden mx-3">
                                            <div class="tab-pane fade show active mt-3 row" id="profile-overview">
                                                <button type="submit" name="id" value="{{ $order->id }}" class="btn btn-primary px-3 col-md-2 col-sm-12 mb-2">دفع</button>
                                                <a href="{{ route('user.order.cancel',$order->id) }}" class="btn btn-danger px-3 col-md-2 col-sm-12   mx-sm-2 mb-2"> رفض
                                                </a>
                                            </div>
                                        </form>
                                        @elseif($order->status == 3)
                                        <div class="tab-pane fade show active mt-3 row" id="profile-overview">
                                            هذا الطلب غير موجود
                                        </div>
                                        @else
                                        <div class="tab-pane fade show active mt-3 row" id="profile-overview">
                                            هذا الطلب تم الغاءه
                                        </div>
                                        @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                            </div>
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
                    <button type="button" class="btn-close close fs-1" data-bs-dismiss="modal" aria-label="Close"></button>
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
