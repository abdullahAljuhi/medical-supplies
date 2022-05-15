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
                    <label for="link" class="form-label">العنوان</label>
                    <div class="invalid-feedback">يرجى تحديد  العنوان  </div>
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
          <!-- Recent Sales -->
          <div class="card  recent-sales overflow-auto my-5">
            <div class="card-body">
                <h5 class="card-title">جدول  المحتوى  </h5>

                <table class="table table-hover datatable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">العنوان</th>
                        <th scope="col">الوصف</th>
                        <th scope="col">العمليات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cities as $city)
                        <tr>
                            <th scope="row"><a href="#">{{ $city->id }}</a></th>
                            <td>{{ $city->name }}</td>
                            <td> {{ $city->governorate['name'] }}</td>
                            <td>{{ $city->created_at }}</td>
                        </tr>
                    @endforeach

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
