@extends('layouts.main')
@section('title', 'طلب جديد')
@section('content')
    <!-- Page Title -->
    <div class="pagetitle container">
        <h1>كشف عرض الاسعار</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">لوحة التحكم</a></li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section profile container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-title pb-0 mb-0">
                        <div class="row mb-2">
                            <div class="col-md-4 col-sm-12 mb-2">
                                <p class="fs-5 py-0 my-0  mx-3">رقم الطلب :
                                    777777
                                </p>
                            </div>
                            <div class="col-md-8 col-sm-12 mb-2">
                                <p class="fs-5 py-0 my-0  mx-3"> اسم الصيدلية :
                                    صيدلية العافية
                                </p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 col-sm-12 mb-2">
                                <p class="fs-5 py-0 my-0  mx-3"> تاريخ الطلب :
                                    2020/20/20
                                </p>
                            </div>
                            <div class="col-md-8 col-sm-12 mb-2">
                                <p class="fs-5 py-0 my-0  mx-3"> عنوان التوصيل :
                                    حضرموت - المكلا -الشارع العام
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="card-body p-0">
                        <div class="tab-content">
                            <div>
                                <div class="card-body p-0">
                                    <div class="table-responsive  pb-3 px-3">
                                        <table class="table border ">
                                            <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">رقم</th>
                                                <th class="border-0">اسم المنتج</th>
                                                <th class="border-0">سعر المنتج</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <div class="m-r-10">
                                                        <img class="img-fluid mb-2 " src="{{asset('img/pro1.jpg ') }}"
                                                             alt="" class="rounded" width="100px" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    </div>
                                                </td>
                                                <td>5000</td>
                                            </tr>

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="2">الاجمالي</td>
                                                <td>$180</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                        <form action="" method="post" class="overflow-hidden mx-3">
                                            <div class="tab-pane fade show active mt-3 row" id="profile-overview">
                                                <button type="submit"
                                                        class="btn btn-primary px-3 col-md-2 col-sm-12 mb-2">دفع
                                                </button>
                                                <a type="submit"
                                                   class="btn btn-danger px-3 col-md-2 col-sm-12   mx-sm-2 mb-2">
                                                    رفض</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                        </div>
                    </div><!-- End Bordered Tabs -->

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img class="img-fluid mb-2 h-100 w-100" src="{{asset('img/pro1.jpg ') }}"
                                         alt="" class="rounded">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        </div>
    </section>
@endsection
