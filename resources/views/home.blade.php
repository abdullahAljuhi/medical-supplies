@extends('layouts.app')
@section('title', 'Home')
@section('content')

<!--Display Error-->
<!-- @if($errors->any())
    {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
@endif -->


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('لوحة التحكم') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id="real">
                    </div>
                    @foreach ($pharmacies as $pharmacy)
                    <div class="alert alert-success" role="alert">
                        <form action="{{ route('admin.check.pharmacy',$pharmacy->id) }}" method="get" id="my_form">
                            @csrf
                            <a href="javascript:{}" class="float-right mark-as-read" onclick="document.getElementById('my_form').submit();">
                                [{{ $pharmacy->created_at }}] pharmacy {{ $pharmacy->pharmacy_name}}
                            </a>
                        </form>
                    </div>
                @endforeach
                    {{ __('لقد تم تسجيل دخولك!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection
