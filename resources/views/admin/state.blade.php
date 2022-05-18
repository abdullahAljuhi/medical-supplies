@extends('layouts.app')
@section('title', 'المحافظات')
@section('content')


<!--Display Error-->
 <!-- @if($errors->any())
    {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
@endif  -->


    <!-- Page Title -->
    <div class="pagetitle">
        <h1>المحافظات</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">لوحة التحكم</a></li>
                <li class="breadcrumb-item active">المحافظات</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section profile">
        <div class="row">


            <div class="col-xl-12">

                <div class="card">
                    <div class="card-title">
                        <p class="fs-5 py-0 my-0 fw-bold mx-3">اضافة محافظة</p>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <form method="post" action="{{ route('store-state') }}">
                                @csrf
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">  ادخل اسم
                                        المحافظة</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="name" type="text" class="form-control form-control @error('name') is-invalid @enderror" id="state" value="">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tab-pane fade show active profile-overview mt-3" id="profile-overview">
                                    <div>
                                        <button type="submit" class="btn btn-primary px-3 ">حفظ</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div><!-- End Bordered Tabs -->

                </div>
            </div>


                 @include('alerts.success')
                 @include('alerts.errors')
        </div>
        </div>
    </section>
    <section class="section">

        <!-- Recent Sales -->
        <div class="card  recent-sales overflow-auto">
            <div class="card-body">
                <h5 class="card-title">جدول المحافظات</h5>

                <table class="table table-hover datatable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">المحافظة</th>
                        <th scope="col">تاريخ الاضافة</th>
                        <th scope="col">الحالة </th>
                        <th scope="col">تعديل </th>
                        <th scope="col">تفعيل </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($governorates as $governorate)
                        <tr>
                            <th scope="row"><a href="#">{{ $governorate->id }}</a></th>
                            <td>{{ $governorate->name }}</td>
                            <td>{{ $governorate->created_at }}</td>
                            <td>
                                @if( $governorate->is_active)
                                    <span style="font-size: 14px"class=" badge text-success fs-6" >
                                        مفعل
                                    </span>
                                @else
                                    <span style="font-size: 14px" class="badge text-danger fs-6">
                                        غير مفعل
                                    </span>
                                @endif

                            </td>
                            <td><a href="{{ route('edit-state', $governorate->id) }}"><button class="btn   btn-outline-success px-4">تعديل</button></td>
                            <td>

                                    @if( $governorate->is_active)
<<<<<<< HEAD
                                    <a href="{{ route('active.state', $governorate->id) }}" class="btn btn-outline-danger   w-100 " >                                         إلغاء التفعيل
                                        </a>
                                    @else
                                    <a href="{{ route('active.state', $governorate->id) }}" class="btn btn-outline-primary   w-100 " >                                        
=======
                                    <a href="{{ route('active.state', $governorate->id) }}" class="btn btn-outline-primary   w-100 " >                                          
                                          إلغاء التفعيل  
                                        </a>
                                    @else
                                    <a href="{{ route('active.state', $governorate->id) }}" class="btn btn-outline-danger   w-100 " >                                          
>>>>>>> 53c8b109b1ec226b962a25483e6d010a18ade966

                                           تفعيل
                                        </a>
                                    @endif
                                    </a>
                            </td>

                        </tr>
                    @endforeach


                    </tbody>
                </table>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header justify-content-center">
                                <h5 class="modal-title" id="exampleModalLabel">هل انت متأكد من تغيير حالة المحافظة</h5>
                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                            </div>
                            <!-- <div class="modal-body">
                            </div> -->
                            <div class="modal-footer justify-content-around">
                                <button type="button" class="btn btn-primary">حفظ التغييرات</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">الغاء</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Recent Sales -->
    </section>

@endsection
