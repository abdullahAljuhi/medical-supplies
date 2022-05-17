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
    @section('scripts')
@auth
<script>
    var notificationsWrapper = $('.dropdown-notifications');
    var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsToggle.find('span[data-count]');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notifications = notificationsWrapper.find('li.scrollable-container');


    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe("order{{  Auth::user()-> id }}");
    // Bind a function to a Event (the full Laravel class)

    channel.bind('App\\Events\\Messages', function(data) {
    //   console.log(data.order.pharmacy_id);
      var existingNotifications = notifications.html();
      var newNotificationHtml = `
        <form action="{{route('order.edit')}}" method="get">
        <input type="hidden" name='id' value="${data.order.id}">
        <button type="submit"> هناك طلب</button>
        </form>`
        ;
      notifications.html(newNotificationHtml + existingNotifications);
      notificationsCount += 1;
      notificationsCountElem.attr('data-count', notificationsCount);
      notificationsWrapper.find('.notify-count').text(notificationsCount);
      notificationsWrapper.show();
    });
</script>
@endauth

@endsection
    @endif
@endsection

