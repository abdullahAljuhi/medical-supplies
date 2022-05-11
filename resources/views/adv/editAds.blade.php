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
                action="{{ route('update.adv',$advertisements->id) }}" enctype="multipart/form-data">
                @csrf
                
                <div class="col-md-6 col-sm-12">
                    <label for="link" class="form-label">رابط الاعلان</label>
                    <input type="url" name="link" class="form-control" id="link" value="{{ $advertisements->link }}" required>
                    <div class="invalid-feedback">يرجى تحديد رابط  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="image" class="form-label"> صورة الاعلان</label>
                    <input type="file" name="image" class="form-control" id="image" required value="{{ $advertisements->image }}">
                    <div class="invalid-feedback">يرجى اسم الصيدلية </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="strat_date" class="form-label"> تاريخ البداء</label>
                    <input type="date" name="start_date" class="form-control" id="stratdate" required  value="{{ $advertisements->start_date }}">
                    <div class="invalid-feedback">يرجى  تحديد تاريخ بداء   </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="end_date" class="form-label">  تاريخ الانتهاء </label>
                    <input type="date" name="end_date" class="form-control" id="end_date" required  value="{{ $advertisements->end_date }}">
                    <div class="invalid-feedback">يرجى تاريخ الانتهاء </div>
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
