@extends('layouts.app')
@section('title', 'الملف الشخصي')
@section('content')

<!--Display Error-->
<!-- @if($errors->any())
    {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
@endif -->


    <!-- Page Title -->
    <div class="pagetitle">
        <h1>المدن</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">لوحة التحكم</a></li>
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
                    @include('alerts.success')
                    @include('alerts.errors')
                        <!-- Bordered Tabs -->
                        <div class="tab-content pt-2">
                            <form method="post" action="{{ route('update-city',$city->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <label for="inputState" class="form-label">حدد المحافظة</label>
                                        <select name="governorate" class="form-select" aria-label="Default select example">
                                            @foreach($governorates as $governorate)
                                                <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="city" class="form-label"> تعديل اسم المدينة</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control form-control @error('name') is-invalid @enderror" id="city" value="{{$city->name}}">
                                            @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade show active profile-overview mt-3" id="profile-overview">
                                    <div >
                                        <button type="submit" class="btn btn-primary px-3 ">تحديث </button>
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