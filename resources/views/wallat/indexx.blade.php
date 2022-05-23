@extends(Auth::user()->type == 0 ? 'layouts.main' : 'layouts.app')
@section('title', ' المحفضه')
@section('content')
<section class="bg-white p-5 shadow">
    <div class="pagetitle">
        <h1>المحفظة</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.blade.php">الرئيسية</a></li>
                <li class="breadcrumb-item active">المحفظة</li>
            </ol>
        </nav>
    </div>
    <div class="row mb-5 ">
        <div class="col-4 ">
            <div class="row shadow  p-3 mx-2 fs-4 rounded">
                <div class="col-10 ">
                    <p class="">رصيدي
                        <span>{{  $wallet->balance }}</span>
                    </p>
                </div>
                <div class="col-2">
                    <i class="bi bi-cash-stack"></i>
                </div>
            </div>
        </div>
        <div class="col-4 ">
            <div class="row shadow  p-3 mx-2 fs-4 rounded">
                <div class="col-10 ">
                    <p class=""> الاموال المحولة
                        {{ $recipient  }}
                    </p>
                </div>
                <div class="col-2">
                    <i class="bi bi-credit-card-2-back-fill"></i>
                </div>
            </div>
        </div>
        <div class="col-4 ">
            <div class="row shadow  p-3 mx-2 fs-4 rounded">
                <div class="col-10 ">
                    <p class=""> الاموال المستلمة
                    {{ $sender }}
                    </p>
                </div>
                <div class="col-2">
                    <i class="bi bi-currency-bitcoin"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row shadow-sm   rounded py-2 px-4 my-2 fs-4 mb-3 bg-light">
        حركة الاموال
    </div>
    <div class="row my-2 py-3 shadow-sm rounded bg-light">
        <div class="col-md-2 col-12 text-center">
            رقم العمليه
        </div>
        <div class="col-md-2 col-12">
            نوع العملية
        </div>
        <div class="col-md-2 col-12 text-center">
            المبلغ
        </div>
        <div class="col-md-2 col-12 text-center">
            تاريخ العملية
        </div>
        <div class="col-md-2 col-12 text-center">
            وصف
        </div>
    </div>
    @foreach ( $transactions as $transaction)      
    <div class="row my-2 py-3 shadow-sm rounded">
        <div class="col-md-2 col-12 text-center">
            {{ $transaction->id }}
        </div>
        <div class="col-md-2 col-12">
            {{ ($transaction->type=='deposit')?'ايداع':'سحب' }}
        </div>
        <div class="col-md-2 col-12 text-center">
            {{ $transaction->amount }}
            
        </div>
        <div class="col-md-2 col-12 text-center">
        
            {{ $transaction->created_at->diffForHumans() }}

        </div>
        <div class="col-md-4 col-12 text-center">
            {{ $transaction->type=='deposit'?'تم اضافة الى المحفظة':'تم سحب من المحفظة' }}
        </div>
    </div>
    @endforeach
</section>
@endsection