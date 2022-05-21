@extends('layouts.app')
@section('title', 'Home')
@section('content')

    <!--Display Error-->
    <!-- @if($errors->any())
        {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
    @endif -->

    <div class="container min-vh-100">
        <div class="row justify-content-center">
            <div class="pagetitle my-3">
                <h1>لوحة التحكم</h1>
            </div>
            <!-- End Page Title -->

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
                                        <span class="ms-2">اسم الصيدلية:</span><b>{{ $pharmacy->pharmacy_name}}</b>
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
@endsection
@section('scripts')

@endsection
