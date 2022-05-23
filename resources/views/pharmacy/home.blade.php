@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('لوحة التحكم') }}</div>

                    @if (Auth::user()->type == 2)
                        @php
                            $q = App\Models\Order::with(['pharmacy' => function($q){
                            return $q->where('user_id', Auth::id() );
                            }],'user')->where('status',0)->where('is_show','0');

                            $orders = $q->limit(6)->get() ??'';

                            // echo $order;
                            $count = $q->count();
                        @endphp
                    @endif

                    <ul>
                        @isset($orders)
                            @foreach ($orders as $order )
                                <li class="notification-item scrollable-container text-center text-nowrap  bg-info-light py-2">
                                    <a href="/pharmacy/order/{{ $order->id }}"
                                       class="d-flex align-items-center text-dark">
                                        <div class="mx-2">
                                            <p class="fs-6 text-dark">هناك طلب من {{ $order->user->name}}</p>
                                            <p class="d-block">{{\Carbon\Carbon::parse($order->created_at)->diffForHumans()}}</p>
                                        </div>
                                        @if(isset($order->user->profile->image))
                                            <img
                                                src="{{asset('assets/images/users/'.$order->user->profile->image)}}"
                                                alt="Profile"
                                                class="rounded-circle border p-1" style="width: 35px;
                                                height: 35px;">
                                        @else
                                            <img src="{{asset('assets/img/user.png') }}" alt="Profile"
                                                 class="rounded-circle border p-1" style="width: 35px;
                                                height: 35px;">
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        @endisset
                    </ul>

                    <div class="card">
                        <div class="card-header">{{ __('اخر الاشعارات') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div id="real">
                            </div>
                            @foreach ($pharmacies as $pharmacy)
                                <div class="alert alert-warning px-0" role="alert">
                                    <form action="{{ route('admin.check.pharmacy',$pharmacy->id) }}" method="get"
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
                                                    class="ms-2">اسم الصيدلية:</span><b>{{ $pharmacy->pharmacy_name}}</b>
                                            </div>
                                            <div class="text-center">
                                                <span class="ms-2">اسم المالك:</span><b>{{ $pharmacy->user->name}}</b>
                                            </div>
                                            <div class="text-center">
                                                            <span
                                                                class="ms-2">وقت التسجيل:</span><b>{{ \Carbon\Carbon::parse($pharmacy->created_at)->diffForHumans()}}</b>
                                            </div>
                                        </a>
                                    </form>
                                </div>
                            @endforeach
                            @if(count($pharmacies)==0)
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
