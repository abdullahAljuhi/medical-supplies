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
                    @forelse($pharmacies as $pharmacy)
                    <div class="alert alert-success" role="alert">
                        <form action="{{ route('admin.check.pharmacy',$pharmacy->id) }}" method="POST" id="my_form">
                            @csrf
                            <a href="javascript:{}" class="float-right mark-as-read" onclick="document.getElementById('my_form').submit();">
                                [{{ $pharmacy->created_at }}] pharmacy {{ $pharmacy->name}} 
                            </a>
                        </form>
                    </div>
                    @empty
                    <div id="real">
                    </div>
                    @endforelse
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
    var channel = pusher.subscribe('active-pharmacy');
    channel.bind('App\\Events\\notfiy', function(data) {
        let real=document.querySelector('#real');
        real.innerHTML +=`
        <form action="{{ route('admin.check.pharmacy') }}" method="POST" id="real_form">
                            @csrf 
                            <input type="hidden" value="${data.pharmacy.id}" name='pharmacy'/>
                            <a href="javascript:{}" class="float-right mark-as-read" onclick="document.getElementById('real_form').submit();">
                                [${data.pharmacy.created_at } pharmacy  ${data.pharmacy.name} 
                            </a>
        </form>
        `;
        real.classList.add("alert","alert-success")
        console.log(data.pharmacy.name);
    });

</script>
@endsection