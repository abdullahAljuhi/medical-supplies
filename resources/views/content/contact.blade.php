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
                                            class="form-control @error('image') is-invalid @enderror" name="image"
                                            value="{{ old('image') }}" required autocomplete="image" autofocus>
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                </div>
                <div class="col-12">
                    <label for="inputState" class="form-label">الوصف</label>
                    <div class="form-floating">
                        <textarea class="form-control text-right" name="description"
                            placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px"></textarea>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <button class="btn btn-primary w-50" type="submit">حفظ</button>
                </div>

            </form>
            </div>
        </div>
        <div class="w-100 bg-light py-5">
            <div class="container">
                <div class="col-md text-center">

                    <div class="row">

                        <div class="col-md-6 col-lg-4 pb-5  ">
                            <div class="h-100 pt-5 pb-3 services-icon-wap shadow ">
                                <div class="h1 text-primary text-center "><i class="bi bi-telephone-fill"></i></div>
                                <h2 class="h5 mt-4 text-center">الهاتف</h2>
                                <p>
                                    772725220
                                </p>
                                <div class="row my-2">
                                    <a class="btn btn-primary w-75 mt-2 mx-auto" href="">تعديل</a>
                                    <a class="btn btn-danger w-75 mt-2 mx-auto" href="">حذف</a>
                                </div>
                            </div>
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
