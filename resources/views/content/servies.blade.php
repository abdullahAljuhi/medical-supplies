@extends( 'layouts.app')
@section('title', 'ادارة المحتوى')
@section('content')

    <!-- Page Title -->
    <div class="pagetitle">
        <h1>ادارة المحتوى</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.blade.php">الرائيسية</a></li>
                <li class="breadcrumb-item active">ادارة المحتوى</li>
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
                    <label for="title" class="form-label">العنوان</label>
                    <div class="invalid-feedback">يرجى تحديد  العنوان  </div>
                    <input id="title" type="text"
                                            class="form-control @error('title') is-invalid @enderror" name="title"
                                            value="{{ old('title') }}" required autocomplete="name" autofocus>
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="image" class="form-label"> صورة  تعبر عن الوصف</label>
                    <input id="image" type="file"
                                            class="form-control custom-file-input @error('image') is-invalid @enderror" name="image"
                                            value="{{ old('image') }}" required autocomplete="image" autofocus>
                                        @error('image')
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
          <!-- Recent Sales -->
          <div class="container">

            <div class="row">

                <div class="col-md-6 col-lg-3 pb-5">
                    <div class="h-100 pt-5 services-icon-wapp shadow-sm border ">
                        <div class="h1 text-primary text-center "><i class="fa fa-truck fa-lg "></i></div>
                        <h2 class="h5 my-4 text-center">توصيل</h2>
                        <div class="row my-2">
                            <a class="btn btn-primary w-75 mt-2 mx-auto" href="">تعديل</a>
                            <a class="btn btn-danger w-75 mt-2 mx-auto" href="">حذف</a>
                        </div>
                    </div>
                   
                </div>
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
