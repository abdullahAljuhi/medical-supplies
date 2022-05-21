@extends('layouts.app')
@section('title', 'الصفحة الرئيسية')
@section('content')

    @include('alerts.errors')
    @include('alerts.success')
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


    <!--Display Error-->
    <!-- @if($errors->any())
        {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
    @endif -->



    <section class="section">

        <!-- Recent Sales -->
        <div class="card  recent-sales overflow-auto p-3">
            <div class="filter">
                <a class="icon px-3" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end text-end">
                    <li class="dropdown-header text-end">
                        <h6>فلترة الطلبات</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">جميع الصيدليات</a></li>
                    <li><a class="dropdown-item" href="#">جديد</a></li>
                    <li><a class="dropdown-item" href="#">قيد الانتظار</a></li>
                    <li><a class="dropdown-item" href="#">مكتمل</a></li>
                    <li><a class="dropdown-item" href="#">غير متوفر</a></li>
                    <li><a class="dropdown-item" href="#">مرفوض</a></li>
                    <li><a class="dropdown-item" href="#">مسترجع</a></li>
                </ul>
            </div>

            <div class="card-body my-3">
                <table class="table table-hover datatable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">الاسم الكامل</th>
                        <th scope="col">الايميل</th>
                        <th scope="col">نوع المستخدم</th>
                        <th scope="col">الحالة</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <a href="www.google.com">
                            <tr style='cursor: pointer; cursor: hand;'
                                onclick="window.location='{{ route('show.profile',['id'=>$user->id]) }}';">
                                <th scope="row"><a href="#">#{{ $user->id }}</a></th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><a href="#" class="text-dark">{{ $types[$user->type] }}</a></td>
                                <td>

                                    @if($user->email_verified_at)
                                        <span class="badge bg-success fs-6">
                                    نشط
                                </span>
                                    @else
                                        <span class="badge bg-danger fs-6">
                                غير مفعل
                                </span>
                                    @endif
                                </td>
                            </tr>
                        </a>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        </div><!-- End Recent Sales -->
    </section>
@endsection

