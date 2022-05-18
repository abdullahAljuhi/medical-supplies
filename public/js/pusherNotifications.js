var notificationsWrapper = $('.dropdown-notifications');
var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
var notificationsCountElem = notificationsToggle.find('span[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('li.scrollable-container');

// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('active-pharmacy');
// Bind a function to a Event (the full Laravel class)
channel.bind('App\\Events\\notfiy', function (data) {
    console.log('hello');
    let token=$('meta[name="csrf-token"]').attr('content');
    var existingNotifications = notifications.html();
    var newNotificationHtml = `<a href="${data.pharmacy.id}">
    <div class="media-body">تسجيل صيدليه <h6 class="media-heading text-right">
    ${data.pharmacy.name}
     </h6><small style="direction: ltr;">
     <p class="media-meta text-muted text-right" style="direction: ltr;">
     ${data.pharmacy.created_at}
      </p> </small></div></div></a>`;
    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notify-count').text(notificationsCount);
    notificationsWrapper.show();
    let real = document.querySelector('#real');
    real.innerHTML += `
    <form action="/dashboard/pharmacy/check" method="POST" id="real_form">
    <input type="hidden" name="_token" value="${token}" />
                        <input type="hidden" value="${data.pharmacy.id}" name='pharmacy'/>
                        <a href="javascript:{}" class="float-right mark-as-read" onclick="document.getElementById('real_form').submit();">
                            [${data.pharmacy.created_at} pharmacy  ${data.pharmacy.pharmacy_name} 
                        </a>
    </form>
    `;
    real.classList.add("alert", "alert-success")
});
