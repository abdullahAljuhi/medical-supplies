@extends( 'layouts.app')
@section('title', 'ادارة الاعلانات')
@section('content')

@include('alerts.errors')
@include('alerts.success')

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
                action="{{ route('save.adv') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 col-sm-12">
                    <label for="link" class="form-label">رابط الاعلان</label>
                    <div class="invalid-feedback">يرجى تحديد رابط  </div>
                    <input id="link" type="url"
                                            class="form-control @error('link') is-invalid @enderror" name="link"
                                            value="{{ old('link') }}" required autocomplete="name" autofocus>
                                        @error('link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="image" class="form-label"> صورة الاعلان</label>
                    <input id="image" type="file"
                                            class="form-control custom-file-input  @error('image') is-invalid @enderror" name="image"
                                            value="{{ old('image') }}" required autocomplete="image" autofocus>
                                            <div class="message-error">يرجى ادخال ملف من نوع صورة</div>
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="strat_date" class="form-label"> تاريخ البدء</label>
                    <input id="strat_date" type="date"
                                            class="form-control @error('strat_date') is-invalid @enderror" name="start_date"
                                            value="{{ old('strat_date') }}" required autocomplete="strat_date" autofocus>
                                            <div class="message-error">يرجى إدراج تاريخ    </div>
                                        @error('strat_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="end_date" class="form-label">  تاريخ الانتهاء </label>
                    <input id="end_date" type="date"
                                            class="form-control @error('end_date') is-invalid @enderror" name="end_date"
                                            value="{{ old('end_date') }}" required autocomplete="end_date" autofocus>
                                            <div class="message-error">يرجى إدراج تاريخ    </div>
                                        @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                </div>

                <div class="col-md-6 col-sm-12">
                    <button class="btn btn-primary w-50" type="submit">حفظ</button>
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
