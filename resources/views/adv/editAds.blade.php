@extends( 'layouts.app')
@section('title', 'ادارة الاعلانات')
@section('content')
@include('alerts.errors')
@include('alerts.success')

<!--Display Error-->
<!-- @if($errors->any())
    {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
@endif -->


    <!-- Page Title -->
    <div class="pagetitle">
        <h1>ادارة الاعلانات</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.blade.php">الرائيسية</a></li>
                <li class="breadcrumb-item active">الاعلانات</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section profile min-vh-100 overflow-hidden">
        
        <div class="wrapper">
            <div class="view_main container shadow ">
                <form class="row g-3 needs-validation" novalidate method="POST"
                action="{{ route('update.adv',$advertisements->id) }}" enctype="multipart/form-data">
                @csrf
                
                <div class="col-md-6 col-sm-12">
                    <label for="link" class="form-label">رابط الاعلان</label>
                    <input type="url" name="link" class="form-control form-control @error('link') is-invalid @enderror" id="link" value="{{ $advertisements->link }}" required>
                    @error('link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="image" class="form-label"> صورة الاعلان</label>
                    <input type="file" name="image" class="form-control form-control @error('image') is-invalid @enderror" id="image" required value="{{ $advertisements->image }}">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="strat_date" class="form-label"> تاريخ البداء</label>
                    <input type="date" name="start_date" class="form-control form-control @error('start_date') is-invalid @enderror" id="stratdate" required  value="{{ $advertisements->start_date }}">
                    @error('start_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="end_date" class="form-label">  تاريخ الانتهاء </label>
                    <input type="date" name="end_date" class="form-control form-control @error('end_date') is-invalid @enderror" id="end_date" required  value="{{ $advertisements->end_date }}">
                    @error('end_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                 
                <div class="col-md-6 col-sm-12">
                    <button class="btn btn-primary w-50" type="submit">تعديل</button>
                </div>
               
            </form>
            </div>
        </div>
    </section>

    <script>
        imgInp = document.getElementById('imgInp');
        blah = document.getElementById('blah');

        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
