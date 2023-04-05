@extends('layout.admin.default')

@section('content')
    <form action="{{route('admin.'.$route.'.store')}}" method="post" class="form-validate ajax-form"
          enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a href="{{route('admin.'.$route.'.index')}}">{{$title}}</a>
                        </h3>
                    </div>
                    <!--begin::Form-->

                    <div class="card-body">

                        <div class="form-group">
                            <label>الاسم<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="ادخل الاسم"
                                   value="{{old('name')}}"
                                   required name="name"/>
                        </div>

                        <div class="form-group">
                            <label>كود اللغة<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="ادخل الكود"
                                   value="{{old('code')}}"
                                   required name="code"/>
                        </div>

                    </div>
                    <!--end::Form-->
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary mr-2 w-100 mb-4">حفظ
                            <i class="fa fa-spinner fa-spin loader" style="display: none;"></i>
                        </button>
                        <a href="{{route('admin.'.$route.'.index')}}" class="btn btn-secondary w-100">رجوع</a>
                    </div>
                </div>
            </div>

        </div>
    </form>

    <!--end::Card-->
@endsection

@push('scripts')
@endpush

