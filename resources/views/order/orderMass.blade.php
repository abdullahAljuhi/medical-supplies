@extends("layouts.main")
@section('content')

<!--Display Error-->
<!-- @if($errors->any())
    {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
@endif -->


    <div class="container  my-5  pt-5">
         <!-- Main Logo -->
   
    <!-- End Logo -->
        <section class="section   profile">
            <div class="d-flex justify-content-center">
                <div class="w-75  ">
                    <div class=" p-5  shadow  cust-card"
                         style="margin-bottom: 0px; overflow: hidden;border-radius: 1rem;">
                        <div class="card-body p-0  ">

                            <!-- Bordered Tabs -->
                            <div class="rounded   p-3 alert alert-info border text-center">
                                تم ارسال الطلب بنجاح سوف يتم التحقق من الطللب وارسال عرض سعر
                            </div>
                            <div class="tab-content p-4 py-1">

                                <div class="tab-pane fade  show active" id="profile-settings">
                                    <form class=" needs-validation" novalidate method="get"
                                          action="{{ route('home') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-primary">الرجوع الى الصفحة الرئيسة
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
