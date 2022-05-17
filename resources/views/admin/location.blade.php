@extends('layouts.app')
@section('title','اعدادات الموقع')
@section('extra-style')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endsection
@section('content')

@include('alerts.errors')
@include('alerts.success')

<!--Display Error-->
<!-- @if($errors->any())
    {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
@endif -->


    <ul class="nav nav-tabs w-100 p-0 mt-2 nav-order p-1 rounded overflow justify-content-center bg-white">

        <li class="nav-item  w-25 fs-5  d-flex justify-content-center align-items-center">
            <button class="nav-link active w-100" data-bs-toggle="tab" data-bs-toggle="tab"
                    data-bs-target="#user-register">المحافظات
            </button>
        </li>

        <li class="nav-item  w-25 fs-5  d-flex justify-content-center align-items-center">
            <button class="nav-link w-100" data-bs-toggle="tab" data-bs-target="#pharmacy-register">المدن</button>
        </li>

    </ul>
    <div class="tab-content">
        <div class="tab-pane fade profile-edit show active" id="user-register">
            <section class="section">

                <div class="card">
                    <div class="card-body pt-3">
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label"> يرجى ادخال اسم
                                    المحافظة</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="state" type="text" class="form-control form-control @error('state') is-invalid @enderror" id="state" value="">
                                    @error('state')
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
                        </div>
                    </div><!-- End Bordered Tabs -->
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
                                <th scope="col">الحالة</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row"><a href="#">#2457</a></th>
                                <td>حضرموت</td>
                                <td class="d-flex justify-content-around">
                                    <span class="badge bg-success">Approved</span>
                                    <form>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                                   id="submitBtn" data-bs-toggle="modal"
                                                   data-bs-target="#exampleModal" checked="">
                                        </div>
                                    </form>
                                </td>
                            </tr>


                            </tbody>
                        </table>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <h5 class="modal-title" id="exampleModalLabel">هل انت متأكد من تغيير حالة
                                            المحافظة</h5>
                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                    </div>
                                    <!-- <div class="modal-body">
                                    </div> -->
                                    <div class="modal-footer justify-content-around">
                                        <button type="button" class="btn btn-primary">حفظ التغييرات</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">الغاء
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Recent Sales -->
            </section>
        </div>

        <div class="tab-pane fade" id="pharmacy-register">
            <section class="section profile">
                <div class="row">
                    <div class="col-xl-12">

                        <div class="card">
                            <div class="card-body pt-3">
                                <!-- Bordered Tabs -->
                                <ul class="nav nav-tabs nav-tabs-bordered stify-content-jucenter">

                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab"
                                                data-bs-target="#profile-overview">المدن
                                        </button>
                                    </li>

                                </ul>
                                <div class="tab-content pt-2">

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="inputState" class="form-label">المحافظة</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>حدد المحافظة</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="city" class="form-label">يرجى ادخال اسم المدينة</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="city" type="text" class="form-control" id="city" value="">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade show active profile-overview mt-3" id="profile-overview">
                                        <div>
                                            <button type="submit" class="btn btn-primary px-3 ">حفظ</button>
                                        </div>
                                    </div>
                                </div>


                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </section>

            <section class="section">

                <!-- Recent Sales -->
                <div class="card  recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">جدول المدن </h5>

                        <table class="table table-hover datatable">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">المحافظة</th>
                                <th scope="col">المدينة</th>
                                <th scope="col">الحالة</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row"><a href="#">#2457</a></th>
                                <td>حضرموت</td>
                                <td> المكلا</td>
                                <td class="d-flex justify-content-around">
                                    <span class="badge bg-success">Approved</span>
                                    <form>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                                   id="submitBtn" data-bs-toggle="modal"
                                                   data-bs-target="#exampleModal" checked="">
                                        </div>
                                    </form>
                                </td>
                            </tr>


                            </tbody>
                        </table>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <h5 class="modal-title" id="exampleModalLabel">هل انت متأكد من تغيير حالة
                                            المدينة</h5>
                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                    </div>
                                    <!-- <div class="modal-body">
                                    </div> -->
                                    <div class="modal-footer justify-content-around">
                                        <button type="button" class="btn btn-primary">حفظ التغييرات</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">الغاء
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Recent Sales -->
            </section>
        </div>

    </div><!-- End Bordered Tabs -->
@endsection
