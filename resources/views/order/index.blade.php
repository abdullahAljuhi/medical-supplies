@extends('layouts.app')
@section('title', 'الصفحة الرئيسية')
@section('content')
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>جميع الطلبات</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.blade.php">الطلبات</a></li>
                <li class="breadcrumb-item active">لوحة التحكم</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">

        <!-- Recent Sales -->
        <div class="card  recent-sales overflow-auto p-3">

            <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow text-end">
                    <li class="dropdown-header text-end">
                        <h6>فلترة</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">جميع الطلبات</a></li>
                    <li><a class="dropdown-item" href="#">الجديدة</a></li>
                    <li><a class="dropdown-item" href="#">قيد الانتظار</a></li>
                    <li><a class="dropdown-item" href="#">مقبول</a></li>
                    <li><a class="dropdown-item" href="#">مرفوض</a></li>
                    <li><a class="dropdown-item" href="#">مكتمل</a></li>
                </ul>
            </div>

            <h5 class="card-title fs-5">جميع مستخدمين النظام</h5>

            <table class="table table-hover datatable">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم العميل</th>
                    <th scope="col">عدد المنتجات</th>
                    <th scope="col">العنوان</th>
                    <th scope="col">تاريخ الطلب</th>
                    <th scope="col">الحالة</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr style='cursor: pointer; cursor: hand;'
                        onclick="window.location='';">
                        <th scope="row"><a href="#">{{ $order->id }}</a></th>
                        <td>{{ $order->user['name'] }}</td>
                        <td>{{ count(json_decode($order->products)) }}</td>
                        <td><a href="#" class="text-dark">{{ $order->address }}</a></td>
                        <td>{{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</td>
                        <td><span class="badge bg-primary fs-6">جديد</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        </div><!-- End Recent Sales -->
    </section>
@endsection

