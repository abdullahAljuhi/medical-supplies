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


                <div class="alert alert-warning text-center" id="profile-overview">
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
                        <div class="col-md-8 col-sm-12 mb-2">
                            <p class="fs-5 py-0 my-0  mx-3"> اسم الصيدلية :
                                {{ $order->pharmacy->pharmacy_name }}
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
                                                <th class="border-0">العمليات </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($products)
                                            @foreach ($products as $product )
                                            {{-- {{$product }} --}}
                                            @if($order->type == 1)
                                            <tr>
                                                <td>{{ $loop->index +1 }}</td>
                                                <td>
                                                    <img src="{{asset('assets/images/orders/'.$product['product_name'])}}"
                                                        alt="" class=" border" srcset=""
                                                        style=";height:50px;width:50px">
                                                </td>
                                                <td>{{ $product['unit_amount']??'' }} </td>
                                                <td>{{ $product['quantity'] }} </td>
                                            </tr>
                                            @else
                                            <tr>
                                                <td>{{ $loop->index +1 }}</td>
                                                <td>{{ $product['product_name'] }}</td>
                                                <td>{{ $product['unit_amount']??'' }} </td>
                                                <td>{{ $product['quantity'] }} </td>
                                                <td>
                                                    @if (isset($product['found']))
                                                    {{ $product['found']==1?'موجود':'غير موجود' }}
                                                    @else
                                                    غير موجود
                                                    @endif
                                                </td>
                                                <td>
                                                    {{-- evt.target --}}
                                                    @if ( Auth::user()->type == 0 && $product['done'] !=1 )
                                                    <a href="{{ route('retrieval.order',[ 'orderId' => $order->id , 'productId' => $product['id']] )}}" class=" btn btn-outline-primary" >
                                                        {{-- data-order="{{$order->id.','.$product['id'] }} --}}
                                                        استرجاع
                                                    </a>
                                                    @elseif(Auth::user()->type==2 && $product['done']!=1)
                                                    <a  data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" class="btn btn-outline-primary">تأكيد التسليم</a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="{{ route('receive.order',$order->id) }}" method="get">

                                                                    <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                    يرجى ادخال كود المستم من الزبون
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input name="code">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                    <button  type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                     
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            <tr>
                                                <td>#</td>
                                                <td>سعر التوصيل</td>
                                                <td colspan="2">{{ $order->delivery_price }} </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2">الاجمالي</td>
                                                <td class="fw-bold">{{ $order->total_price }}</td>
                                            </tr>

                                        </tfoot>
                                        @endisset
                                    </table>
                                    @if(Auth::user()->type == 0)
                                    @if($order->status < 3) <form action="{{ route('test') }}" method="get"
                                        class="overflow-hidden mx-3">
                                        <div class="tab-pane fade show active mt-3 row" id="profile-overview">
                                            <button type="submit" name="id" value="{{ $order->id }}"
                                                class="btn btn-primary px-3 col-md-2 col-sm-12 mb-2">دفع</button>
                                            <a href="{{ route('user.order.cancel',$order->id) }}"
                                                class="btn btn-danger px-3 col-md-2 col-sm-12   mx-sm-2 mb-2"> رفض
                                            </a>
                                        </div>
                                        </form>
                                        @elseif($order->status == 3)
                                        <div class="alert alert-danger" id="profile-overview">
                                            هذا الطلب غير موجود
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


        $('.retreive').click(function(e){
            console.log(e.target);
            let d =$('.retreive').attr("data-order").split(',');
            // console.log(d);



});
</script>
@endsection