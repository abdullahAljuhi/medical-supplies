@extends(Auth::user()->type == 0 ? 'layouts.main' : 'layouts.app')
@section('title', 'الملف الشخصي')
@section('content')
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>الملف الشخصي</h1>
        <nav>
            <ol class="breadcrumb">
{{--                <li class="breadcrumb-item">الملف الشخصي</li>--}}
{{--                <li class="breadcrumb-item">Users</li>--}}
{{--                <li class="breadcrumb-item active">Profile</li>--}}
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section profile min-vh-100 mt-5 overflow-hidden">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        @if(isset(Auth::user()->profile->image))
                            <img src="{{asset('assets/images/users/'.Auth::user()->profile->image)}}" alt="Profile"
                                 class="rounded-circle border p-1">
                        @else
                            <img src="{{asset('assets/img/user.png') }}" alt="Profile"
                                 class="rounded-circle border p-1">
                        @endif
                        {{--                        <img src="{{$user->profile['image']?asset('assets/images/users/'.$user->profile['image']) : asset('assets/img/user.png') }}" alt="Profile" class="rounded-circle">--}}
                        <h2 class="my-3">{{ $user->name }}</h2>
                        <h3>{{ $user->email }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        @if($user->id === Auth::user()->id)
                            <a href="{{ route('edit.profile') }}" class="btn btn-outline-primary"> تعديل بيانات
                                الحساب</a>
                        @endif
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">بيانات عامة</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">اسم الكامل</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                                </div>


                                @isset($user->profile['address'])
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">العنوان</div>
                                    <div class="col-lg-9 col-md-8">
                                            {{$user->profile['address']}}
                                    </div>
                                </div>
                                @endisset

                                @isset($user->profile['birthday'])
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">العمر</div>
                                        <div class="col-lg-9 col-md-8">
{{--                                            {{$user->profile['birthday']}}--}}
                                            {{\Carbon\Carbon::parse($user->profile['birthday'])->diff(\Carbon\Carbon::now())->format('%y سنة')}}
                                        </div>
                                    </div>
                                @endisset

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">هاتف</div>
                                    <div class="col-lg-9 col-md-8">
                                        @isset($user->profile['phone'])
                                            {{$user->profile['phone']}}
                                        @endisset</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">البريد الالكتروني</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                </div>

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection
