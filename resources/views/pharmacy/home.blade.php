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
