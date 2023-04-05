@extends('layout.admin.default')

@section('content')
    <form action="{{route('admin.'.$route.'.update',$item->id)}}" method="post" class="form-validate ajax-form"
          enctype="multipart/form-data">
        @csrf
        @method('put')
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
                                   value="{{$item->name}}"
                                   required name="name" value="{{old('name')}}"/>
                        </div>
                        <div class="form-group">
                            <label>رقم الجوال <span class="text-danger">*</span></label>
                            <input type="mobile" class="form-control" placeholder="ادخل رقم الجوال"
                                   name="mobile"
                                   value="{{$item->mobile}}"/>
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
                                   placeholder="تأكيد كلمة المرور"/>
                        </div>
                    </div>

                    <!--end::Form-->
                </div>

                <br>
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                            العتوان على الخريطة
                        </h3>
                    </div>
                    <!--begin::Form-->

                    <div class="card-body">
                        <input type="hidden" name="lat" value="{{$item->lat}}" id="lat">
                        <input type="hidden" name="lng" value="{{$item->lng}}" id="lng">
                        <div id="map" style="width: 100%;height: 500px;"></div>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                            تفاصيل
                        </h3>
                    </div>

                    <div class="card-body">
                        @include('admin.partials.image',['iValue'=>$item->getImage()])
                        <div class="form-group">
                            <label for="password">الخدمات<span class="text-danger">*</span></label>
                            <select name="services_id[]" id="services_id" class="form-control " multiple>
                                @php($itemService=$item->services->pluck('id')->toArray())
                                @foreach($services as $val)
                                    <option
                                        value="{{$val->id}}" {{in_array($val->id,$itemService)?"selected":""}}>{{$val->title}}</option>
                                @endforeach
                            </select>
                        </div>


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
    <script>
        $('#services_id').select2({
            placeholder: "الرجاء اختيار الخدمات"
        });

    </script>
@endpush
@include('admin.base.map',['lat'=>$item->lat,'lng'=>$item->lng,'enableClick'=>true])

