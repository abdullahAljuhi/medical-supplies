@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="pagetitle">
            <h1>لوحة التحكم</h1>
            <nav>
                <ol class="breadcrumb">
                    {{--                <li class="breadcrumb-item"><a href="../index.blade.php">الرائيسية</a></li>--}}
                    {{--                <li class="breadcrumb-item active">ملف الصيدلية</li>--}}
                </ol>
            </nav>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @php
                        $pharmacy = App\Models\Pharmacy::where('user_id', Auth::id())->first();
                        $q = App\Models\Order::with('user','pharmacy')->where('pharmacy_id', $pharmacy->id)->where('status',0)->where('is_show','0');

                        $orders = $q->limit(6)->get() ??'';

                        // echo $order;
                        $count = $q->count();
                    @endphp

                    <div class="card mb-0">
                        <div class="card-header">{{ __('اخر الاشعارات') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div id="real">
                            </div>
                            @foreach ($orders as $order)
                                <div class="alert alert-warning px-0" role="alert">
                                    <form action="/pharmacy/order/{{ $order->id }}" method="get"
                                          id="my_form">
                                        @csrf
                                        <a href="javascript:{}"
                                           class="float-right mark-as-read d-flex flex-wrap justify-content-around text-dark"
                                           onclick="document.getElementById('my_form').submit();">
                                            <div class="text-center">
                                                <span>#</span><b>{{ $loop->index + 1  }}</b>
                                            </div>
                                            <div class="text-center">
                                                <span
                                                    class="ms-2">اسم الصيدلية:</span><b>{{ $order->pharmacy['pharmacy_name']}}</b>
                                            </div>
                                            <div class="text-center">
                                                <span class="ms-2">اسم المالك:</span><b>{{ $order->user['name']}}</b>
                                            </div>
                                            <div class="text-center">
                                                            <span
                                                                class="ms-2">وقت التسجيل:</span><b>{{ \Carbon\Carbon::parse($order->created_at)->diffForHumans()}}</b>
                                            </div>
                                        </a>
                                    </form>
                                </div>
                            @endforeach
                            @if(count($orders)==0)
                                <div class="text-center my-3">
                                    <span class="fs-5">{{ __('لا يوجد اي اشعارات جديدة') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
