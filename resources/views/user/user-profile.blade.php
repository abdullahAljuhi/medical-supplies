@extends(Auth::user()->type == 0 ? 'layouts.main' : 'layouts.app')
@section('title', 'الملف الشخصي')
@section('content')
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>اعدادات الحساب</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.blade.php">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->


    <!-- End Page Title -->
    @include('alerts.success')
    @include('alerts.errors')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="section profile min-vh-100 overflow-hidden">
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
                        {{--                        <img src="{{$user->profile['image']?asset('assets/images/users/'.$user->profile['image']) : asset('assets/img/user.png') }}" alt="Profile" class="rounded-circle border p-1">--}}
                        <h2>{{ Auth::user()->name }}</h2>
                        <h3>{{ Auth::user()->email }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs w-100 p-0 mt-2 nav-order p-1 rounded overflow justify-content-center bg-white">

                            <li class="nav-item mx-1  d-flex justify-content-center align-items-center">
                                <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-edit">تعديل الملف
                                    الشخصي
                                </button>
                            </li>

                            <li class="nav-item  d-flex justify-content-center align-items-center">
                                <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">تغيير كلمة
                                    المرور
                                </button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade profile-edit show active pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form method="POST" action="{{ route('update.profile') }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">الصورة
                                            الشخصية</label>
                                        <div class="col-md-8 col-lg-9 d-flex align-items-center justify-content-center">
                                            <div class="pt-2">
                                                <label class="btn btn-primary text-light">
                                                    <i class="bi bi-upload p-5"></i>
                                                    <input type="file" id="imgInp" name="image" hidden>
                                                </label>
                                                <a href="#" class="btn btn-danger btn-sm d-none"
                                                   title="Remove my profile image">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                            @if(isset(Auth::user()->profile->image))
                                                <img
                                                    src="{{asset('assets/images/users/'.Auth::user()->profile->image)}}"
                                                    alt="Profile"
                                                    class="mx-auto rounded-circle border p-1" id="blah">
                                            @else
                                                <img src="{{asset('assets/img/user.png') }}" alt="Profile"
                                                     class="mx-auto rounded-circle border p-1" id="blah">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">اسم
                                            الكامل</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="fullName"
                                                   value="{{ $user->name }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">تاريخ الميلاد</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input style="direction: ltr" name="birthday" type="date"
                                                   class="form-control"
                                                   id="birthday">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">الهاتف</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Job"
                                                   value="{{ $user->profile['phone'] }}">
                                        </div>
                                    </div>

{{--                                    <div class="row mb-3">--}}
{{--                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">العنوان</label>--}}
{{--                                        <div class="col-md-8 col-lg-9">--}}
{{--                                            <input name="company" type="text" class="form-control" id="company"--}}
{{--                                                   value="{{ Auth::user()->address }}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="row mb-3">--}}
{{--                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">الشارع</label>--}}
{{--                                        <div class="col-md-8 col-lg-9">--}}
{{--                                            <input name="street" type="text" class="form-control" id="fullName"--}}
{{--                                                   value="{{ $user->profile['address'] }}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->
                            </div>


                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form>

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">كلمة
                                            المرور الحالية</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control"
                                                   id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">كلمة المرور
                                            الجديدة</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control"
                                                   id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">تأكيد كلمة
                                            المرور
                                            الجديدة</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control"
                                                   id="renewPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        imgInp = document.getElementById('imgInp');
        blah = document.getElementById('blah');

        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
        var birth = "{{date("Y-m-d", strtotime($user->profile['birthday']))}}";
        document.getElementById("birthday").defaultValue = birth;
        // $('#birthday').value(birth);
    </script>
@endsection
