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
                    <th scope="col">عدد الطلبات</th>
                    <th scope="col">العنوان</th>
                    <th scope="col">تاريخ الطلب</th>
                    <th scope="col">الحالة</th>
                </tr>
                </thead>
                <tbody>
                <tr style='cursor: pointer; cursor: hand;'
                    onclick="window.location='';">
                    <th scope="row"><a href="#">#12</a></th>
                    <td>عبدالله عمر باعبود</td>
                    <td>5</td>
                    <td><a href="#" class="text-dark">حضرموت المكلا فوه</a></td>
                    <td>2020/05/12</td>
                    <td><span class="badge bg-success fs-6">مقبول</span>
                    </td>
                </tr>
                <tr style='cursor: pointer; cursor: hand;'
                    onclick="window.location='';">
                    <th scope="row"><a href="#">#13</a></th>
                    <td>عبدالله عمر باعبود</td>
                    <td>5</td>
                    <td><a href="#" class="text-dark">حضرموت المكلا فوه</a></td>
                    <td>2020/05/12</td>
                    <td><span class="badge bg-danger fs-6">مرفوض</span>
                    </td>
                </tr>
                <tr style='cursor: pointer; cursor: hand;'
                    onclick="window.location='';">
                    <th scope="row"><a href="#">#13</a></th>
                    <td>عبدالله عمر باعبود</td>
                    <td>5</td>
                    <td><a href="#" class="text-dark">حضرموت المكلا فوه</a></td>
                    <td>2020/05/12</td>
                    <td><span class="badge bg-secondary fs-6">غير متوفر</span>
                    </td>
                </tr>
                <tr style='cursor: pointer; cursor: hand;'
                    onclick="window.location='';">
                    <th scope="row"><a href="#">#13</a></th>
                    <td>عبدالله عمر باعبود</td>
                    <td>5</td>
                    <td><a href="#" class="text-dark">حضرموت المكلا فوه</a></td>
                    <td>2020/05/12</td>
                    <td><span class="badge bg-primary fs-6">جديد</span>
                    </td>
                </tr>
                <tr style='cursor: pointer; cursor: hand;'
                    onclick="window.location='';">
                    <th scope="row"><a href="#">#13</a></th>
                    <td>عبدالله عمر باعبود</td>
                    <td>5</td>
                    <td><a href="#" class="text-dark">حضرموت المكلا فوه</a></td>
                    <td>2020/05/12</td>
                    <td><span class="badge bg-warning fs-6">قيد الانتظار</span>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
        </div><!-- End Recent Sales -->
    </section>
@endsection

