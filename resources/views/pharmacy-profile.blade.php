@extends( 'layouts.app')
@section('title', 'الملف الشخصي')
@section('content')

    <!-- Page Title -->
    <div class="pagetitle">
        <h1>ملف الصيدلية</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.blade.php">الرائيسية</a></li>
                <li class="breadcrumb-item active">ملف الصيدلية</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section profile min-vh-100 overflow-hidden">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="{{ asset('assets/img/user.png') }}" alt="Profile" class="rounded-circle border p-1">
                       <h5 class="card-title fs-4 text-primary text-center">صيدلية ماهر </h5>
                        <p class="card-text fs-5 text-secondary text-center w-100"><i class="bi bi-geo-alt  text-primary ms-1"></i> حضرموت -  المكلا </p>
                        <ul class="text-center footer-icons d-flex justify-content-center mb-0">
                            <li class="list-inline-item text-center">
                                <a class="  text-decoration-none" target="_blank" href="http://facebook.com/"><i
                                        class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item  text-center">
                                <a class=" text-decoration-none" target="_blank"
                                   href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item  text-center">
                                <a class=" text-decoration-none" target="_blank" href="https://twitter.com/"><i
                                        class="fab fa-twitter fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item  text-center">
                                <a class=" text-decoration-none" target="_blank"
                                   href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                            </li>
                           </ul>
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
                                        data-bs-target="#profile-edit">تعديل ملف الصيدلية
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
                            <div class="tab-pane fade profile-edit show active pt-3" id="profile-edit">


                                <!-- Profile Edit Form -->
                                <form method="POST" action="{{ route('update.profile') }}">
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
                                            <img src="{{ asset('assets/img/user.png') }}" id="blah" alt="Profile"
                                                 class="mx-auto rounded-circle border p-1">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">اسم
                                            الكامل</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="fullName"
                                                   value="صيدلية ماهر">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">رقم الهاتف</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="tel" class="form-control" id="company"
                                                   value="772725220">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">رثم الموبايل</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="mobile" type="text" class="form-control" id="company"
                                                   value="05303638">
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
                                                   value=" الشارع العام">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">تفاصيل العنوان</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="detaile_address" type="text" class="form-control" id="fullName"
                                            value="امام مسجد الصديق">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">رابط الفيسبوك</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="facebook" type="url" class="form-control" id="company"
                                                   value="www.facebook.com">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">رابط الانستقرام</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="instgram" type="url" class="form-control" id="company"
                                                   value=" ">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">رابط تويتر</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="twitter" type="url" class="form-control" id="company"
                                                   value="">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">رابط لاينكدن</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="linkdin" type="url" class="form-control" id="company"
                                                   value="">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">وصف عن الصيدلية</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea class="form-control "  name="detlaie" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;">
                                            تم افتتاح صيدلية ماهر عام 1997 م ....
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->
                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form method="POST"
                                    action="">
                                    @csrf

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
