@extends('layouts.app')
@section('title', 'المحافظات')
@section('content')

@include('alerts.errors')
@include('alerts.success')



    <!-- Page Title -->
    <div class="pagetitle">
        <h1>المحافظات</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">لوحة التحكم</a></li>
                <li class="breadcrumb-item active">المحافظات</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section profile">
        <div class="row">


            <div class="col-xl-12">

                <div class="card">
                    <div class="card-title">
                        <p class="fs-5 py-0 my-0 fw-bold mx-3">تعديل محافظة</p>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <form method="post" action="{{ route('update-state',$governorate->id) }}">
                                @csrf
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label"> يرجى تعديل اسم
                                        المحافظة</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="name" type="text" class="form-control form-control @error('name') is-invalid @enderror" id="gover" value="{{$governorate->name}}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tab-pane fade show active profile-overview mt-3" id="profile-overview">
                                    <div>
                                        <button type="submit" class="btn btn-primary px-3 ">تحديث</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
        </div>
    </section>
@endsection
