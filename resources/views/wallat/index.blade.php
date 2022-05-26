@extends(Auth::user()->type == 0 ? 'layouts.main' : 'layouts.app')
@section('title', ' المحفضه')
@section('content')

    @include('alerts.errors')
    @include('alerts.success')




    <!-- Page Title -->
    <div class="pagetitle px-5 pt-5">
        <h1>ادارة المحفظة</h1>
    </div>
    <!-- End Page Title -->

    <!-- Satistics -->
    <div class="row px-5">

        <div class="col-xxl-8 col-md-6">
            <div class="card info-card revenue-card">

                <div class="card-body">
                    <h5 class="card-title fs-5 fw-bolder">الرصيد الحالي</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center mx-3"
                             style="font-size: 32px;width: 64px;height: 64px;color: #2eca6a;background: #e0f8e9;">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <div class="ps-3">
                            <span class="fs-3">$3,264</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="row px-5">

        <div class="col-xxl-4 col-md-6">

            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title fs-5 fw-bolder">الايداع</h5>
                    <div class="d-flex align-items-center">
                        <div
                            class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-info-light mx-3"
                            style="font-size: 32px;width: 64px;height: 64px;">
                            <i class="bi bi-plus-circle text-info"></i>
                        </div>
                        <div class="ps-3">
                            <p class="fs-3">$2500</p>
                            <span class="text-success fw-bold">12</span>
                            <span class="text-muted">عملية سحب</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-xxl-4 col-md-6">

            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title fs-5 fw-bolder">السحب</h5>
                    <div class="d-flex align-items-center">
                        <div
                            class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-danger-light mx-3"
                            style="font-size: 32px;width: 64px;height: 64px;color: #ff771d;background: #ffecdf;">
                            <i class="bi bi-dash-circle text-danger"></i>
                        </div>
                        <div class="ps-3">
                            <p class="fs-3">$1750</p>
                            <span class="text-danger fw-bold">12</span>
                            <span class="text-muted">عملية سحب</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

{{--    <div class="row px-5 pt-3">--}}
{{--        <div class="col-4 ">--}}
{{--            <div class="row shadow  p-3 mx-2 fs-4 rounded align-items-center bg-white">--}}
{{--                <div class="col-10">--}}
{{--                    <p class="fs-5 text-secondary my-0">الرصيد الحالي:--}}
{{--                        <span class="mx-3 fs-3 text-success">{{  $wallet->balance }}$</span>--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                <div class="col-2">--}}
{{--                    <i class="bi bi-cash-stack text-success"></i>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <section class="section profile min-vh-100 overflow-hidden px-5">
        <div class="bg-white py-3 px-5 shadow rounded">

            <div class="mt-3">
                <div class="row fs-5 fw-bold p-2 rounded border-bottom mb-2">
                    <div class="col-1">
                        الرقم
                    </div>
                    <div class="col-7 ">
                        <div class="row">
                            <div class="col-9 ">
                                الوصف
                            </div>
                            <div class="col-3">
                                الفاتورة
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        التاريخ
                    </div>
                    <div class="col-1">
                        <div class="row fs-5">
                            <div class="col-6">
                                المبلغ
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ( $transactions as $transaction)
                    <div class="row fs-5 shadow-sm p-2 rounded text-primary mb-2">
                        <div class="col-1">
                            {{ $transaction->id }}
                        </div>
                        <div class="col-7 ">
                            <div class="row">
                                @if($transaction->type=='deposit')

                                    <div class="col-9">
                                        تم ايداع مبلغ في حسابك بفاتورة رقم
                                    </div>
                                    <div class="col-3">
                                        {{ $loop->index + 125 }}
                                    </div>
                                @else
                                    <div class="col-9">
                                        تم سحب مبلغ من حسابك بفاتورة رقم
                                    </div>
                                    <div class="col-3">
                                        125
                                    </div>
                                @endif

                            </div>
                        </div>
                        <div class="col-2">
                            {{ $transaction->created_at->diffForHumans() }}
                        </div>
                        <div class="col-2">
                            <div class="row fs-5">
                                <div class="col-6">
                                    {{ $transaction->amount }}
                                </div>
                 
                            </div>
                        </div>
                    </div>
                @endforeach
                @if(count($transactions) == 0)
                    <p class="text-center fs-4 mt-5">لا يوجد اي عمليات</p>
                @endif
            </div>
        </div>
    </section>
    </div>
@endsection
