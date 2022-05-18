<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<div class="d-flex justify-content-center py-4">
    <a href="/" class="logo d-flex align-items-center w-auto">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">علاجي كوم</span>
    </a>
</div><!-- End Logo -->
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
