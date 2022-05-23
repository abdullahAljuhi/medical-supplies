@extends(Auth::user()->type == 0 ? 'layouts.main' : 'layouts.app')
@section('title', ' المحفضه')
@section('content')

@include('alerts.errors')
@include('alerts.success')

<!-- Display Error
@if($errors->any())
    {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
@endif -->



<!-- Page Title -->
<div class="pagetitle">
    <h1>ادارة المحفظة</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.blade.php">الرئيسية</a></li>
            <li class="breadcrumb-item active">المحفظة</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section profile min-vh-100 overflow-hidden ">
    <div class="row fs-4 fw-bold bg-white py-3 px-5  w-100 shadow-sm">
        <div class="col-6 ">
            العمليات :
        </div>
        <div class="col-6   text-success text-center">
            الرصيد الحالي : {{ $wallet->balance }}
        </div>
    </div>

    <div class="bg-white my-3 py-3 px-5 shadow rounded">

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
                            {{ $loop->index + 125 }}
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
                        <div class="col-6">
                            <i class="bi bi-plus-circle-fill "></i>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

</section>
</div>
@endsection