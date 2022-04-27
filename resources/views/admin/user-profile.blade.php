@extends('layouts.app')
@section('title', 'الملف الشخصي')
@section('content')

    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.blade.php">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section profile min-vh-100 overflow-hidden">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="{{ asset('assets/img/user.png') }}" alt="Profile" class="rounded-circle">
                        <h2>{{ Auth::user()->name }}</h2>
                        <h3>{{ Auth::user()->email }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered justify-content-center">

                            <li class="nav-item p-1">
                                <button class="nav-link active bg-white" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">نظرة
                                    عامة
                                </button>
                            </li>

                            <li class="nav-item p-1">
                                <button class="nav-link bg-white" data-bs-toggle="tab" data-bs-target="#profile-edit">
                                    تعديل الملف
                                    الشخصي
                                </button>
                            </li>

                            <li class="nav-item p-1">
                                <button class="nav-link bg-white" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">تغيير كلمة
                                    المرور
                                </button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">بيانات عامة</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">اسم الكامل</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">العنوان</div>
                                    <div class="col-lg-9 col-md-8">حضرموت - المكلا</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">هاتف</div>
                                    <div class="col-lg-9 col-md-8">770-552-517</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">البريد الالكتروني</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form>
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
                                            <img src="{{ asset('assets/img/user.png') }}" id="blah" alt="Profile"
                                                 class="mx-auto">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">اسم
                                            الكامل</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="fullName" type="text" class="form-control" id="fullName"
                                                   value="مراد العمودي">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">العنوان</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="company" type="text" class="form-control" id="company"
                                                   value="حضرموت - المكلا - المساكن">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">تاريخ الميلاد</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input style="direction: ltr" name="birthday" type="date"
                                                   class="form-control"
                                                   id="Job" value="770-552-517">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">الهاتف</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Job"
                                                   value="770-552-517">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-8 col-lg-9 input-group">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">العنوان</label>
                                            <select name="governorate" class="form-select select1 mx-2"
                                                    id="inputGroupSelect01">
                                                <option selected="" value="0">حضرموت</option>
                                                <option value="1">المهرة</option>
                                                <option value="2">عدن</option>
                                            </select>
                                            <!-- <label class="input-group-text" for="inputGroupSelect02">Options</label> -->
                                            <select name="city" class="form-select select2 mx-2" id="inputGroupSelect02"
                                                    style="">
                                                <option value="1">المكلا</option>
                                                <option value="2">سيئون</option>
                                                <option value="2">الشحر</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">الشارع</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="street" type="text" class="form-control" id="fullName"
                                                   value="امام مسجد الصديق">
                                        </div>
                                    </div>

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
    </script>
@endsection
