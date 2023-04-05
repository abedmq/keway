@extends('layout.admin.default')

@section('content')
    <form action="{{route('admin.profiles.update')}}" method="post" class="form-validate ajax-form" enctype="multipart/form-data">
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
                            <label>الاسم <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="ادخل الاسم"
                                   value="{{$user->name}}"
                                   required name="name" value="{{old('name')}}"/>
                        </div>
                        <div class="form-group">
                            <label>البريد الإلكتروني <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" placeholder="ادخل البريد الإلكتروني"
                                   disabled
                                   value="{{$user->email}}"/>
                        </div>
                        <div class="form-group">
                            <label for="password">كلمة المرور <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="كلمة المرور"
                                   />
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">تأكيد كلمة المرور <span
                                        class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation"
                                   placeholder="تأكيد كلمة المرور" />
                        </div>

                    </div>
                    <!--end::Form-->
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                            الصورة
                        </h3>
                    </div>

                    <div class="card-body">
                        @include('admin.partials.image',['iValue'=>$user->getImage('250')])
                    </div>
                </div>
                <br>
                <div class="card card-custom">

                    <div class="card-body">
                        <button type="submit" class="btn btn-primary mr-2 w-100 mb-4">حفظ
                            <i class="fa fa-spinner fa-spin loader" style="display: none;"></i>
                        </button>

                        <button type="reset" class="btn btn-secondary w-100">الغاء</button>
                    </div>
                </div>
            </div>

        </div>
    </form>

    <!--end::Card-->
@endsection

@push('scripts')
@endpush

