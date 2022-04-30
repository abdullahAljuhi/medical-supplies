@extends('layouts.app')
@section('title', 'الصيدليات')
@section('content')

    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.blade.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
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
                <ul>
                    @foreach ($pharmacies as $p)
                        <li>{{ $p }}
                        <a href="{{ route('admin.pharmacy.active',$p->id) }}">تفغيل</a>
                        <a href="{{ route('admin.pharmacy.disActive',$p->id) }}"> الغاء التفغيل</a>
                        </li>

                    @endforeach
                </ul>
                <table class="table table-hover datatable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">الصيدلية</th>
                        <th scope="col">المالك</th>
                        <th scope="col">الايميل</th>
                        <th scope="col">الحالة</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>صيدلية الحياة</td>
                        <td>مراد العمودي</td>
                        <td><a href="#" class="text-primary">murad77@gmail.com</a></td>
                        <td class="d-flex justify-content-around">
                            <span class="badge bg-success">Approved</span>
                            <form>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" id="submitBtn" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal" checked="">
                                </div>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2147</a></th>
                        <td>صيدلية الامل</td>
                        <td>محمد زبير</td>
                        <td><a href="#" class="text-primary">zubair7@gmail.com</a></td>
                        <td class="d-flex justify-content-around">
                            <span class="badge bg-warning">Pending</span>
                            <form>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" id="submitBtn" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                </div>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2049</a></th>
                        <td>صيدليةالناس</td>
                        <td>ناصر الغيثي</td>
                        <td><a href="#" class="text-primary">nasier@gmail.com</a></td>
                        <td class="d-flex justify-content-around"><span class="badge bg-success">Approved</span>
                            <form>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" id="submitBtn" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal" checked>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>صيدلية الصديق</td>
                        <td>فؤاد العمودي</td>
                        <td><a href="#" class="text-primary">fuad@gmail.com</a></td>
                        <td class="d-flex justify-content-around">
                            <span class="badge bg-danger">Rejected</span>
                            <form>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" id="submitBtn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                </div>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>صيدلية الأقصى</td>
                        <td>مراد العمودي</td>
                        <td><a href="#" class="text-primary">amas@gmail.com</a></td>
                        <td class="d-flex justify-content-around">
                            <span class="badge bg-success">Approved</span>
                            <form>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" id="submitBtn" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal" checked>
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
