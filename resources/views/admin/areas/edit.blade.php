@extends('layout.admin.default')

@section('content')
    <form action="{{route('admin.'.$route.'.update',$item)}}" method="post" class="form-validate ajax-form"
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
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            @foreach(\App\Models\Language::list() as $lang)
                                <li class="nav-item">
                                    <a class="nav-link {{$loop->first?'active':''}}" id="lang-{{$lang->id}}"
                                       data-toggle="tab"
                                       href="#lang-tab-{{$lang->id}}">
																	<span class="nav-icon">
                                                                        <img style="width: 20px"
                                                                             src="images/{{$lang->code}}.png" alt="">
																	</span>
                                        <span class="nav-text">{{$lang->name}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content mt-5" id="myTabContent">
                            @foreach(\App\Models\Language::list() as $lang)
                                <div class="tab-pane fade {{$loop->first?"active show":""}}" id="lang-tab-{{$lang->id}}"
                                     role="tabpanel"
                                     aria-labelledby="home-tab">

                                    <div class="form-group">
                                        <label>الاسم<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="ادخل الاسم"
                                               value="{{$item->getTrans('title',$lang->id)}}"
                                               required name="lang[title][{{$lang->id}}]"/>
                                    </div>
                                </div>
                            @endforeach
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
                    <!--begin::Form-->

                    <div class="card-body">
                        <div class="form-group">
                            <label>نصف القطر<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" min="1" placeholder="ادخل نصف القطر"
                                   value="{{$item->getBase('diameter')}}"
                                   required name="diameter"/>
                            <small style="color:red;">الرجاء اضافة نصف القطر بالكيلو متر</small>
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
@endpush
@include('admin.base.map',['lat'=>$item->lat,'lng'=>$item->lng,'enableClick'=>true])


