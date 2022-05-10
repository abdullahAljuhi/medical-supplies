@extends('layouts.app')
@section('title', 'الصيدليات')
@section('content')

    <!-- Page Title -->
    <div class="pagetitle">
        <h1>الصيدليات</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">لوحة التحكم</a></li>
                <li class="breadcrumb-item active">الصيدليات</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">

        <!-- Recent Sales -->
        <div class="card  recent-sales overflow-auto">

            <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
            </div>

            <div class="card-body">
                <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                <table class="table table-hover datatable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">الصيدلية</th>
                        <th scope="col">المالك</th>
                        <th scope="col">الايميل</th>
                        <th scope="col">الحالة</th>
                        <th scope="col">تفعيل / الغاء تفعيل</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($pharmacies as $pharmacy)
                        <tr style='cursor: pointer; cursor: hand;' onclick="window.location='{{ route('admin.pharmacy.show',$pharmacy->id) }}';">
                            <th scope="row">{{ $pharmacy->id }}</th>
                            <td> {{ $pharmacy->pharmacy_name }}</td>
                            <td> {{ $pharmacy->user['name'] }}</td>
                            <td><a href="#" class="text-primary">{{ $pharmacy->user['email'] }}</a></td>
                            @if($pharmacy->is_active)
                                <td>
                                    <span class="badge bg-success fs-6">
                                        نشط
                                    </span>
                                </td>
                                <td class="d-flex justify-content-around">
{{--                                    <a class="btn btn-primary disabled" href="{{ route('admin.pharmacy.active',$pharmacy->id) }}">تفغيل</a>--}}
                                    <a class="btn btn-outline-danger" href="{{ route('admin.pharmacy.disActive',$pharmacy->id) }}"> الغاء التفغيل</a>
                                </td>
                            @else
                                <td>
                                    <span class="badge bg-warning fs-6">
                                        غير مفعل
                                    </span>
                                </td>
                                <td class="d-flex justify-content-around">
                                    <a class="btn btn-outline-primary" href="{{ route('admin.pharmacy.active',$pharmacy->id) }}">تفغيل</a>
{{--                                    <a class="btn btn-danger disabled" href="{{ route('admin.pharmacy.disActive',$pharmacy->id) }}"> الغاء التفغيل</a>--}}
                                </td>
                            @endif
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
                                <h5 class="modal-title" id="exampleModalLabel">هل انت متأكد من تغيير حالة المستخدم</h5>
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
