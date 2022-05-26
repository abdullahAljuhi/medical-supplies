var notificationsWrapper = $('.dropdown-notifications');
var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
var notificationsCountElem = notificationsToggle.find('span[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('li.scrollable-container.notify');

// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('active-pharmacy');
// Bind a function to a Event (the full Laravel class)
channel.bind('App\\Events\\notfiy', function (data) {
    let token=$('meta[name="csrf-token"]').attr('content');
    var existingNotifications = notifications.html();
    var newNotificationHtml =
    `<a href="/dashboard/pharmacy/check/${data.pharmacy.id}" class="d-flex align-items-center text-dark text-center" style="justify-content: space-around;align-items: center;">
    <div class="mx-2">
        <p class="fs-6 text-dark text-nowrap my-0" style="text-align: center;"> ${data.pharmacy.pharmacy_name} تسجيل صيدليه </p>
        <small class="text-center" style='font-size: 12px'> الان  </small>
    </div>
    <img src="{{asset('assets/img/user.png') }}" alt="Profile"class="rounded-circle border p-1"
    style="width: 35px;height: 35px;">
</a>`
    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notify-count').text(notificationsCount);
    notificationsWrapper.show();
    // let real = document.querySelector('#real');
    // real.innerHTML += `
    // <form action="/dashboard/pharmacy/check" method="POST" id="real_form">
    // <input type="hidden" name="_token" value="${token}" />
    //                     <input type="hidden" value="${data.pharmacy.id}" name='pharmacy'/>
    //                     <a href="javascript:{}" class="float-right mark-as-read" onclick="document.getElementById('real_form').submit();">
    //                         [${data.pharmacy.created_at} pharmacy  ${data.pharmacy.pharmacy_name} 
    //                     </a>
    // </form>
    // `;
    // real.classList.add("alert", "alert-success")
});
