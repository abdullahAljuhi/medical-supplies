@extends('layouts.app')
@section('title', 'الصفحة الرئيسية')
@section('content')
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.blade.php">Home</a></li>
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
                        <td><span class="badge bg-success">Approved</span></td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2147</a></th>
                        <td>صيدلية الامل</td>
                        <td>محمد زبير</td>
                        <td><a href="#" class="text-primary">zubair7@gmail.com</a></td>
                        <td><span class="badge bg-warning">Pending</span></td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2049</a></th>
                        <td>صيدليةالناس</td>
                        <td>ناصر الغيثي</td>
                        <td><a href="#" class="text-primary">nasier@gmail.com</a></td>
                        <td><span class="badge bg-success">Approved</span></td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>صيدلية الصديق</td>
                        <td>فؤاد العمودي</td>
                        <td><a href="#" class="text-primary">fuad@gmail.com</a></td>
                        <td><span class="badge bg-danger">Rejected</span></td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>صيدلية الأقصى</td>
                        <td>مراد العمودي</td>
                        <td><a href="#" class="text-primary">amas@gmail.com</a></td>
                        <td><span class="badge bg-success">Approved</span></td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>صيدلية الحياة</td>
                        <td>مراد العمودي</td>
                        <td><a href="#" class="text-primary">murad77@gmail.com</a></td>
                        <td><span class="badge bg-success">Approved</span></td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2147</a></th>
                        <td>صيدلية الامل</td>
                        <td>محمد زبير</td>
                        <td><a href="#" class="text-primary">zubair7@gmail.com</a></td>
                        <td><span class="badge bg-warning">Pending</span></td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2049</a></th>
                        <td>صيدليةالناس</td>
                        <td>ناصر الغيثي</td>
                        <td><a href="#" class="text-primary">nasier@gmail.com</a></td>
                        <td><span class="badge bg-success">Approved</span></td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>صيدلية الصديق</td>
                        <td>فؤاد العمودي</td>
                        <td><a href="#" class="text-primary">fuad@gmail.com</a></td>
                        <td><span class="badge bg-danger">Rejected</span></td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>صيدلية الأقصى</td>
                        <td>مراد العمودي</td>
                        <td><a href="#" class="text-primary">amas@gmail.com</a></td>
                        <td><span class="badge bg-success">Approved</span></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div><!-- End Recent Sales -->
    </section>
@endsection

