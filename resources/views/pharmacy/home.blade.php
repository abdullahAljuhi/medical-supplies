@extends('layouts.app')
@section('title', 'Home')
@section('content')
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
                        {{ __('لقد تم تسجيل دخولك!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('e4b4e21e1f468b8bddf2', {
            cluster: 'mt1'
        });

    </script>
    @if(Auth::user()->id==1)
        <script src="{{asset('js/pusherNotifications.js')}}"></script>
    @else

    @endif
@endsection
