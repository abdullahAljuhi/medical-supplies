@extends('layouts.app')
@section('scripts')
<script>
  var notificationsWrapper = $('.dropdown-notifications');
  var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
  var notificationsCountElem = notificationsToggle.find('span[data-count]');
  var notificationsCount = parseInt(notificationsCountElem.data('count'));
  var notifications = notificationsWrapper.find('li.scrollable-container');

  console.log('order{{ Auth::user()->pharmacy->id }}');
  // Subscribe to the channel we specified in our Laravel Event
  var channel = pusher.subscribe('order' + {{  Auth::user()-> pharmacy -> id }});
  // Bind a function to a Event (the full Laravel class)

  channel.bind('App\\Events\\Messages', function(data) {
    console.log(data.order.pharmacy_id);
    var existingNotifications = notifications.html();
    var newNotificationHtml = `
    <form action="{{route('order.edit')}}" method="get">
<input type="hidden" name='id' value="${data.order.id}">
<button type="submit"> هناك طلب</button>
</form>    `;
    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notify-count').text(notificationsCount);
    notificationsWrapper.show();
  });
</script>


@endsection