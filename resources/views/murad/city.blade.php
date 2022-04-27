@extends('layouts.app')
@section('title', 'الملف الشخصي')
@section('content')
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>الملف الشخصي</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.blade.php">الصفحة الرائيسية</a></li>
                <li class="breadcrumb-item">العنوان</li>
                <li class="breadcrumb-item active">المدن</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered stify-content-jucenter">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">المدن</button>
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
                                <div >
                                    <button type="submit" class="btn btn-primary px-3 ">حفظ </button>
                                </div>
                            </div>
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
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" id="submitBtn" data-bs-toggle="modal"
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
