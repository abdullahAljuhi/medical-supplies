{{-- @if(Auth::user()->type != 0)
{{ $app='layouts.app' }}
@else
{{ $app='layouts.main' }}
@enif --}}
@extends(Auth::user()->type == 0 ? 'layouts.main' : 'layouts.app')

{{-- @extends($app) --}}
@section('title', 'طلب جديد')
@section('content')
<!-- Page Title -->
<div class="pagetitle mt-5 container">
    <h1>فاتورة</h1>
    <nav>
        <ol class="breadcrumb">
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="container">
    <div class="col-xl-12 col-md-12 col-12 mb-md-0 mb-4">
        <div class="card invoice-preview-card">
            <div class="card-body pb-0">
                <div
                    class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
                    <div class="py-md-0 py-2">
                        <div>
                            <h4>فاتورة مشتريات # {{ $order->id }}</h4>
                            <div class="">
                                <span class="me-1">تاريخ الطلب:</span>
                                <span class="fw-semibold"> {{ $order->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="">
                                <span class="me-1"> رمز تأكيد الطلب:</span>
                                <span class="fw-semibold"> {{ $code }}</span>
                            </div>
                            <div class="">
                                <span class="me-1"> نوع بطاقة الدفع :</span>
                                <span class="fw-semibold"> {{ $card }}</span>
                            </div>
                            @if($order->status == 4)
                            <div class="">
                                <span class="me-1"> ملاحظة:</span>
                                <span class="fw-semibold text-danger fw-bold">
                                    هذا الطلب غير موجود
                                </span>
                            </div>
                            @elseif($order->status == 5)
                            <div class="">
                                <span class="me-1"> ملاحظة:</span>
                                <span class="fw-semibold text-danger fw-bold"> هذا الطلب تم الغاءه
                                </span>
                            </div>

                            @elseif($order->status == 7)
                            <div class="">
                                <span class="me-1"> ملاحظة:</span>
                                <span class="fw-semibold text-danger fw-bold">
                                    هذا الطلب تم استرجاعه
                                </span>
                            </div>
                            @endif


                        </div>
                    </div>

                    <div class="tab-pane fade show active mt-3 row fs-1" id="profile-overview">
                    </div>

                </div>
            </div>
            <hr class="my-0">
            <div class="card-body">
                <div class="row p-sm-3  p-2">
                    <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                        <h6 class="pb-2"> بيانات الصيدلية:</h6>
                        <div class="mb-2">
                            <span class="me-1"> اسم الصيدلية:</span>
                            <span class="fw-semibold"> {{ $order->pharmacy->pharmacy_name }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="me-1"> العنوان:</span>
                            <span class="fw-semibold"> {{ $order->pharmacy->address[0]->governorate->name }} - {{
                                $order->pharmacy->address[0]->city->name ??''}} - {{
                                $order->pharmacy->address[0]->street ??''}}</span>
                        </div>
                        <div class="mb-2">
                            <span class="me-1"> الهاتف :</span>
                            <span class="fw-semibold"> {{ $order->pharmacy->phone }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="me-1"> الموبايل :</span>
                            <span class="fw-semibold"> {{ $order->pharmacy->mobile }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="me-1"> الايميل :</span>
                            <span class="fw-semibold"> {{ $order->pharmacy->user->email }}</span>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                        <h6 class="pb-2"> بيانات المستخدم:</h6>
                        <div class="mb-2">
                            <span class="me-1"> اسم المتسخدم:</span>
                            <span class="fw-semibold"> {{ $order->user->name }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="me-1"> عنوان التوصيل:</span>
                            <span class="fw-semibold"> {{ $order->address }} </span>
                        </div>

                        <div class="mb-2">
                            <span class="me-1"> الايميل :</span>
                            <span class="fw-semibold"> {{ $order->user->email }}</span>
                        </div>

                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table border-top m-0">
                    <thead>
                        <tr>
                            <th>رقم</th>
                            <th>المنتج</th>
                            <th>التكلفة</th>
                            <th>الكمية</th>
                            <th>الاجمالي</th>
                            <th>ملاحظات / تواجد المنتج</th>
                            <th> العمليات</th>

                        </tr>
                    </thead>
                    <tbody>
                        @isset($products)
                        @foreach ($products as $product )
                        @if($order->type == 1)
                        <tr>
                            <td>{{ $loop->index +1 }} </td>
                            <td>
                                <img src="{{asset('assets/images/orders/'.$product['product_name'])}}" alt=""
                                    class=" border" srcset="" style=";height:50px;width:50px">
                            </td>
                            <td>{{ $product['unit_amount']??'' }} </td>
                            <td>{{ $product['quantity'] }} </td>
                            <td class="fw-bold">
                                {{ $product['quantity'] *$product['unit_amount'] }} 
                            </td>

                            <td>
                                @isset($product['found'])
                                {{ $product['found']== 1 ?'موجود':'غير موجود' }}
                                @endisset
                               
                            </td>
                            <td>
                
                                @if ( Auth::user()->type == 0 && $order->status== 2 &&  $product['yield'] != 1 && $product['found']== 1)

                                <a href="{{ route('retrieval.order',[ 'orderId' => $order->id , 'productId' => $product['id']] )}}"
                                    class=" btn btn-outline-primary">
                                    استرجاع
                                </a>

                                @endif
                                

                            </td>
                        </tr>
                        @else
                        <tr>
                            <td>{{ $loop->index +1 }}</td>
                            <td class="text-nowrap">{{ $product['product_name'] }}</td>
                            <td>{{ $product['unit_amount']??'' }} </td>
                            <td>{{ $product['quantity'] }} </td>
                            <td class="fw-bold">{{ $product['quantity'] *$product['unit_amount'] }} </td>

                            <td>
                                @isset($product['found'])
                                {{ $product['found']== 1 ?'موجود':'غير موجود' }}
                                @endisset
                            </td>
                            <td>
                                @if ( Auth::user()->type == 0 && $order->status== 2 &&  $product['yield'] != 1 && $product['found'] == 1)

                                <a href="{{ route('retrieval.order',[ 'orderId' => $order->id , 'productId' => $product['id']] )}}"
                                    class=" btn btn-outline-primary">
                                    استرجاع
                                </a>

                                @endif
                            </td>
                        </tr>
                        @endif
                        @endforeach


                        @endisset
                        <tr>
                            <td class="text-end px-4 ">
                                <p class="mb-0">سعر التوصيل:</p>
                            </td>
                            <td class="px-4 " colspan="6">
                                <p class="fw-semibold mb-0 fw-bold">{{ $order->delivery_price }}ريال </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end px-4 ">
                                <p class="mb-0">الاجمالي:</p>
                            </td>
                            <td class="px-4 " colspan="6">
                                <p class="fw-semibold mb-0 fw-bold"> {{ $order->total_price }}ريال</p>
                            </td>

                            <td>

                                @if(Auth::user()->type==2 && $order->status == 2)
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    class="btn btn-outline-primary">تأكيد التسليم</a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog d-flex align-items-center">
                                        <div class="modal-content">
                                            <form action="{{ route('receive.order',$order->id) }}" method="get">

                                                <div class="modal-header text-center">
                                                    <h5 class="modal-title text-center" id="exampleModalLabel">
                                                        يرجى ادخال كود المستم من الزبون
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <input name="code">
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal"> اغلاق </button>
                                                    <button type="submit" class="btn btn-primary">

                                                        ارسال
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card-body">
                <div class="row py-3">
                    <div class="col-12">
                        <span class="fw-bold">ملاحظة:</span>
                        <span>لا يوجد اي ملاحظات</span>
                    </div>
                    <div class="col-12">
                        @if(Auth::user()->type == 0)

                        <div class="tab-pane fade show active mt-3 row" id="profile-overview">
                        @if($order->status < 2) 
                        <form action="{{ route('test') }}" method="get" class="overflow-hidden mx-3">
                                <button type="submit" name="id" value="{{ $order->id }}" class="btn btn-primary px-3 col-md-2 col-sm-12 mb-2">دفع</button>
                                <a href="{{ route('user.order.cancel',$order->id) }}" class="btn btn-danger px-3 col-md-2 col-sm-12   mx-sm-2 mb-2"> رفض
                                </a>
                        </form>
                              @elseif($order->status == 2 )
                              <a href="{{ route('retrieval.order',[ 'orderId' => $order->id] )}}" class="btn btn-wirring px-3 col-md-2 col-sm-12 mb-2">
                                  استرجاع الطلب كامل
                              </a>
                              @endif
                            </div>
                            @endif
                    </div>
                </div>

            </div>
            <div class="card-bod">
                <div class="row p-3">

                </div>
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