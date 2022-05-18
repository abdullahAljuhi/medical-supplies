@extends('layouts.app')
@section('title', 'الملف الشخصي')
@section('content')



<!--Display Error-->
<!-- @if($errors->any())
    {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
@endif -->

    <!-- Page Title -->
    <div class="pagetitle">
        <h1>المدن</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">لوحة التحكم</a></li>
                <li class="breadcrumb-item active">المدن</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <!--Display Error-->
@if($errors->any())
    {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
@endif

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <div class="tab-content pt-2">
                            <form method="post" action="{{ route('store-city') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <label for="inputState" class="form-label">حدد المحافظة</label>
                                        <select name="governorate" class="form-select" aria-label="Default select example">
                                            @foreach($governorates as $governorate)
                                                <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="city" class="form-label"> ادخل اسم المدينة</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input  name="name" type="text" class="form-control" id="city" value="">
                                            @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade show active profile-overview mt-3" id="profile-overview">
                                    <div >
                                        <button type="submit" class="btn btn-primary px-3 ">حفظ </button>
                                    </div>
                                </div>
                            </form>
                         </div>


                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="section">

        <!-- Recent Sales -->
        <div class="card  recent-sales overflow-auto">
            <div class="card-body">
                <h5 class="card-title">جدول المدن  </h5>

                @include('alerts.success')
                @include('alerts.errors')
                <table class="table table-hover datatable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اسم المدينة</th>
                        <th scope="col">اسم المحافظة</th>
                        <th scope="col">تاريخ الاضافة</th>
                        <th scope="col">تعديل </th>
                        <th scope="col">الحالة </th>
                        <th scope="col">تفعيل </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cities as $city)
                        <tr>
                            <th scope="row"><a href="#">{{ $city->id }}</a></th>
                            <td>{{ $city->name }}</td>
                            <td> {{ $city->governorate['name'] }}</td>
                            <td>{{ $city->created_at }}</td>
                            <td><a href="{{ route('edit-city', $city->id) }}"><button class="btn ">تعديل</button></td>
                            <td>
                                @if( $city->is_active)
                                    <span style="font-size: 14px"class=" badge text-success fs-6" >
                                        مفعل  
                                    </span>
                                @else
                                    <span style="font-size: 14px" class="badge text-danger fs-6">
                                        غير مفعل
                                    </span>
                                @endif
                               
                            </td>
                            <td><a href="{{ route('active.city', $city->id) }}" >
                                   <button type="button" class="btn ">
                                        @if( $city->is_active)
                                            <span style="font-size: 14px"class=" badge text-danger fs-6" >
                                             إلغاء التفعيل 
                                           </span>
                                        @else
                                            <span style="font-size: 14px" class="badge text-success fs-6">
                                             تفعيل
                                            </span>
                                        @endif
                                    
                                    </button>
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
                                <h5 class="modal-title" id="exampleModalLabel">هل انت متأكد من تغيير حالة المدينة</h5>
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
