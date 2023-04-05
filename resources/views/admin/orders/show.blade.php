@extends('layout.admin.default')
@section('content')

    <!--begin::Card-->
    <div class="card card-custom">
        <!--begin::Card header-->
        <div class="card-header card-header-tabs-line nav-tabs-line-3x">
            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                    <!--begin::Item-->
                    <li class="nav-item mr-3">
                        <a class="nav-link active" data-toggle="tab" href="#order_details">
														<span class="nav-icon">
															<span class="svg-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"/>
																		<path
                                                                            d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                                            fill="#000000" fill-rule="nonzero"/>
																		<path
                                                                            d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                                            fill="#000000" opacity="0.3"/>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                            <span class="nav-text font-size-lg">بيانات الطلب</span>
                        </a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="nav-item mr-3">
                        <a class="nav-link" data-toggle="tab" href="#order_user">
														<span class="nav-icon">
															<span class="svg-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"/>
																		<path
                                                                            d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                                            fill="#000000" fill-rule="nonzero"
                                                                            opacity="0.3"/>
																		<path
                                                                            d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                                            fill="#000000" fill-rule="nonzero"/>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                            <span class="nav-text font-size-lg">المستخدم</span>
                        </a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="nav-item mr-3">
                        <a class="nav-link " data-toggle="tab" href="#order_provider">
														<span class="nav-icon">
															<span class="svg-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<path
                                                                            d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                                                            fill="#000000" opacity="0.3"/>
																		<path
                                                                            d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                                                            fill="#000000" opacity="0.3"/>
																		<path
                                                                            d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                                                            fill="#000000" opacity="0.3"/>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                            <span class="nav-text font-size-lg">الفني</span>
                        </a>
                    </li>
                    <!--end::Item-->
                @if($item->status->isComplete())
                    <!--begin::Item-->
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#order_invoice">
														<span class="nav-icon">
															<span class="svg-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<path
                                                                            d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z"
                                                                            fill="#000000" opacity="0.3"/>
																		<path
                                                                            d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z"
                                                                            fill="#000000"/>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                <span class="nav-text font-size-lg">الفاتورة</span>
                            </a>
                        </li>
                        <!--end::Item-->
                @endif
                <!--end::Item-->
                @if($item->bills->count())
                    <!--begin::Item-->
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#order_images">
														<span class="nav-icon">
															<span class="svg-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<path
                                                                            d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z"
                                                                            fill="#000000" opacity="0.3"/>
																		<path
                                                                            d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z"
                                                                            fill="#000000"/>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                <span class="nav-text font-size-lg">الصور</span>
                            </a>
                        </li>
                        <!--end::Item-->
                    @endif
                </ul>
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <div class="tab-content">
                <!--begin::Tab-->
                <div class="tab-pane show active px-7" id="order_details" role="tabpanel">
                    <!--begin::Row-->
                    <form action="{{route('admin.orders.update',$item)}}" method="post" class="ajax-form row">
                        @csrf
                        @method('put')

                        <div class="col-xl-2"></div>

                        <div class="col-xl-7 my-2">
                            <!--begin::Row-->
                            <div class="row">
                                <label class="col-3"></label>
                                <div class="col-9">
                                    <h6 class="text-dark font-weight-bold mb-10">بيانات الطلب</h6>
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Group-->

                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">الخدمة</label>
                                <div class="col-9">
                                    <select class="form-control form-control-lg form-control-solid" required
                                            name="service_id">
                                        @foreach(\App\Models\Service::get() as $r)
                                            <option
                                                value="{{$r->id}}" {{$r->id==$item->service_id?"selected":""}} >{{$r->getTrans('title')}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">المنطقة</label>
                                <div class="col-9">
                                    <select class="form-control form-control-lg form-control-solid" disabled>
                                        @foreach(\App\Models\Area::get() as $r)
                                            <option
                                                value="{{$r->id}}" {{$r->id==$item->area_id?"selected":""}} >{{$r->getTrans('title')}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">الحالة</label>
                                <div class="col-9">
                                    <select class="form-control form-control-lg form-control-solid"
                                            id="status_id"
                                            {{$item->cancel_at?"readonly":"required"}}
                                            name="status_id">
                                        @foreach(\App\Models\OrderStatus::get() as $r)
                                            <option
                                                value="{{$r->id}}" {{$r->id==$item->status_id?"selected":""}} >{{$r->getTrans('title')}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row " id="cancel_reason"
                                 style="display: {{$item->status->isCancel()?"flex":"none"}}">
                                <label class="col-form-label col-3 text-lg-right text-left">سبب الالغاء</label>
                                <div class="col-9">
                                    <select class="form-control form-control-lg form-control-solid"
                                            name="cancel_reason_id"
                                            id="cancel_reason_id"
                                    >
                                        @foreach(\App\Models\CancelReason::get() as $r)
                                            <option
                                                value="{{$r->id}}" {{$r->id==$item->cancel_reason_id?"selected":""}} >{{$r->getTrans('title')}}</option>
                                        @endforeach
                                        <option value="0" {{!$item->cancel_reason_id?"selected":""}}>أخرى</option>
                                    </select>
                                </div>
                            </div>
                            @if($item->cancel_at)
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">تم الإلغاء
                                        بواسطة</label>
                                    <div class="col-9">
                                        @if($item->cancel_user_id)
                                            @if($item->cancel_user_id==$item->user_id)
                                                <span
                                                    class="label label-warning label-pill label-inline mr-2">{{$item->user->name}}(المستخدم)</span>
                                            @else
                                                <span
                                                    class="label label-info label-pill label-inline mr-2">{{$item->provider->name}}(الفني)</span>
                                            @endif
                                        @else
                                            <span
                                                class="label label-danger label-pill label-inline mr-2">المشرف</span>
                                        @endif
                                    </div>
                                </div>
                            @endif

                        <!--begin::Group-->
                            <div class="form-group row" id="cancel_reason_other"
                                 style="display:{{$item->cancel_reason?"flex":"none"}};">
                                <label class="col-form-label col-3 text-lg-right text-left">سبب الالغاء</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid" type="text"
                                           name="cancel_reason"
                                           value="{{$item->cancel_reason}}"/>
                                </div>
                            </div>
                            <!--begin::Group-->
                            @if($item->cancel_at)
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">تاريخ
                                        الالغاء</label>
                                    <div class="col-9">
                                        <input class="form-control form-control-lg form-control-solid" disabled
                                               value="{{$item->cancel_at->format('Y-m-d H:i:s')}}"/>
                                    </div>
                                </div>
                            @endif

                            @if($item->status->isComplete())
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">حالة الدفع</label>
                                    <div class="col-9">
                                        @if($item->is_pay_complete)
                                            <span
                                                class="label label-success label-pill label-inline mr-2">تم الدفع</span>

                                        @else
                                            <span
                                                class="label label-danger label-pill label-inline mr-2">غير مدفوع</span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if($item->estimated_time)
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">الوقت
                                        المتوقع</label>
                                    <div class="col-9">
                                        <input class="form-control form-control-lg form-control-solid" disabled
                                               value="{{$item->estimated_time}}"/>
                                    </div>
                                </div>
                            @endif
                            @if($item->estimated_price)
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">المبلغ
                                        المتوقع</label>
                                    <div class="col-9">
                                        <input class="form-control form-control-lg form-control-solid" disabled
                                               value="{{$item->estimated_price}}"/>
                                    </div>
                                </div>
                            @endif
                            @if($item->estimated_price_parts)
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">المبلغ المتوقع
                                        للفواتير</label>
                                    <div class="col-9">
                                        <input class="form-control form-control-lg form-control-solid" disabled
                                               value="{{$item->estimated_price_parts}}"/>
                                    </div>
                                </div>
                            @endif
                            @if($item->check_description)
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">وصف
                                        المشكلة</label>
                                    <div class="col-9">
                                                <textarea class="form-control form-control-lg form-control-solid"
                                                          disabled>{{$item->check_description}}</textarea>
                                    </div>
                                </div>
                            @endif

                            @if($item->check_at)
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">تاريخ
                                        الفحص</label>
                                    <div class="col-9">
                                        <input class="form-control form-control-lg form-control-solid" disabled
                                               value="{{$item->check_at->format('Y-m-d h:i:s a')}}"/>
                                    </div>
                                </div>
                            @endif
                            @if($item->complete_at)
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">تاريخ انتهاء
                                        العمل</label>
                                    <div class="col-9">
                                        <input class="form-control form-control-lg form-control-solid" disabled
                                               value="{{$item->complete_at->format('Y-m-d h:i:s a')}}"/>
                                    </div>
                                </div>
                            @endif
                            @if($item->duration)
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">عدد ساعات
                                        العمل</label>
                                    <div class="col-9">
                                        <input class="form-control form-control-lg form-control-solid" disabled
                                               value="{{$item->getDurationInHour()}}">
                                    </div>
                                </div>
                            @endif

                            @if($item->bring_times)
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">
                                        عدد مرات احضار القطع
                                    </label>
                                    <div class="col-9">
                                        <input class="form-control form-control-lg form-control-solid"
                                               name="bring_times"
                                               value="{{$item->bring_times}}">
                                    </div>
                                </div>
                            @endif
                            @if($item->bought_price)
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">
                                        سعر القطع
                                    </label>
                                    <div class="col-9">
                                        <input class="form-control form-control-lg form-control-solid"
                                               name="bought_price"
                                               value="{{$item->bought_price}}">
                                    </div>
                                </div>
                            @endif
                            @if($item->status->isWorking())
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">حالة
                                        العمل</label>
                                    <div class="col-3">
   <span class="switch switch-outline switch-icon switch-success">
    <label>
     <input type="checkbox" checked="checked" {{$item->is_working?"checked":""}} disabled/>

     <span></span>
    </label>
    <strog>
        يعمل حاليا</strog>

   </span>
                                    </div>
                                </div>
                        @endif
                        <!--end::Group-->

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">حفظ</button>
                            </div>
                        </div>

                    </form>
                    <!--end::Row-->
                </div>
                <!--end::Tab-->
                <!--begin::Tab-->
                <div class="tab-pane px-7" id="order_user" role="tabpanel">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-7">
                            <div class="my-2">
                                <!--begin::Row-->
                                <div class="row">
                                    <label class="col-form-label col-3 text-lg-right text-left"></label>
                                    <div class="col-9">
                                        <h6 class="text-dark font-weight-bold mb-10">بيانات المستخدم</h6>
                                    </div>
                                </div>
                                <!--end::Row-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">الاسم</label>
                                    <div class="col-9">
                                        {{--                                                <div--}}
                                        {{--                                                    class="spinner spinner-sm spinner-success spinner-right spinner-input">--}}
                                        {{--                                                    --}}
                                        <input class="form-control form-control-lg form-control-solid"
                                               disabled
                                               type="text" value="{{$item->user->name}}"/>
                                    </div>
                                    {{--                                </div>--}}
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">رقم الجوال</label>
                                    <div class="col-9">
                                        <div class="input-group input-group-lg input-group-solid">
                                            {{--                                        <div class="input-group-prepend">--}}
                                            {{--																				<span class="input-group-text">--}}
                                            {{--																					<i class="la la-at"></i>--}}
                                            {{--																				</span>--}}
                                            {{--                                        </div>--}}
                                            <input disabled
                                                   class="form-control form-control-lg form-control-solid"
                                                   value="{{$item->user->mobile}}"/>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Group-->

                            </div>
                        </div>
                    </div>
                    <!--end::Row-->
                    <div class="separator separator-dashed my-10"></div>
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-7">
                            <!--end::Row-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">
                                    عدد الطلبات</label>
                                <div class="col-9">
                                    <div class="form-text text-muted mt-3">
                                        <a href="admin/orders?user_id={{$item->user_id}}"
                                           target="_blank">{{$item->user->orders()->count()}} طلب</a>
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                        </div>
                        <div class="col-xl-2"></div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Tab-->
                <!--begin::Tab-->
                <div class="tab-pane px-7" id="order_provider" role="tabpanel">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-7">
                            <div class="my-2">
                                <!--begin::Row-->
                                <div class="row">
                                    <label class="col-form-label col-3 text-lg-right text-left"></label>
                                    <div class="col-9">
                                        <h6 class="text-dark font-weight-bold mb-10">بيانات الفني</h6>
                                    </div>
                                </div>
                                <!--end::Row-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">الاسم</label>
                                    <div class="col-9">
                                        {{--                                                <div--}}
                                        {{--                                                    class="spinner spinner-sm spinner-success spinner-right spinner-input">--}}
                                        {{--                                                    --}}
                                        <input class="form-control form-control-lg form-control-solid"
                                               disabled
                                               type="text" value="{{$item->provider->name}}"/>
                                    </div>
                                    {{--                                </div>--}}
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">رقم الجوال</label>
                                    <div class="col-9">
                                        <div class="input-group input-group-lg input-group-solid">
                                            {{--                                        <div class="input-group-prepend">--}}
                                            {{--																				<span class="input-group-text">--}}
                                            {{--																					<i class="la la-at"></i>--}}
                                            {{--																				</span>--}}
                                            {{--                                        </div>--}}
                                            <input disabled
                                                   class="form-control form-control-lg form-control-solid"
                                                   value="{{$item->provider->mobile}}"/>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Group-->

                            </div>
                        </div>
                    </div>
                    <!--end::Row-->
                    <div class="separator separator-dashed my-10"></div>
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-7">
                            <!--end::Row-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">
                                    عدد الطلبات</label>
                                <div class="col-9">
                                    <div class="form-text text-muted mt-3">
                                        <a href="admin/orders?provider_id={{$item->provider_id}}"
                                           target="_blank">{{$item->provider->orders()->count()}} طلب</a>
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                        </div>
                        <div class="col-xl-2"></div>
                    </div>
                    <!--end::Row-->
                    <div class="separator separator-dashed my-10"></div>
                    <div class="row">
                        <label class="col-3"></label>
                        <div class="col-9">
                            <h6 class="text-dark font-weight-bold mb-10">العنوان على الخريطة</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-7">
                            <div id="map" style="width: 100%;height: 500px;"></div>
                        </div>
                    </div>
                </div>
                <!--end::Tab-->
            @if($item->status->isComplete())

                <!--begin::Tab-->
                    <div class="tab-pane px-7" id="order_invoice" role="tabpanel">
                        <!-- begin: Invoice header-->
                        <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                            <div class="col-md-10">
                                <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                                    <h1 class="display-4 font-weight-boldest mb-10">تفاصيل الفاتورة</h1>
                                    <div class="d-flex flex-column align-items-md-end px-0">
                                        <!--begin::Logo-->
                                        <a href="#" class="mb-5">
                                            <img src="media/logos/logo-dark.png" alt=""/>
                                        </a>
                                        <!--end::Logo-->
                                        <span class="d-flex flex-column align-items-md-end opacity-70">
																	<span>فاتورة طلب في موقع نملة</span>
																	<span>1234567</span>
																</span>
                                    </div>
                                </div>
                                <div class="border-bottom w-100"></div>
                                <div class="d-flex justify-content-between pt-6">
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">تاريخ الطلب</span>
                                        <span class="opacity-70">{{$item->created_at->format('Y-m-d h:i:s a')}}</span>
                                    </div>
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">رقم الطلب.</span>
                                        <span class="opacity-70">{{$item->id}}</span>
                                    </div>
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">حالة الدفع</span>
                                        <span class="opacity-70">{{$item->is_pay_complete?"مدفوع":"غير مدفوع"}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice header-->
                        <!-- begin: Invoice body-->
                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-10">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="pl-0 font-weight-bold text-muted text-uppercase">العنصر</th>
                                            <th class="text-right font-weight-bold text-muted text-uppercase">الكمية
                                            </th>
                                            <th class="text-right font-weight-bold text-muted text-uppercase">السعر
                                            </th>
                                            <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">
                                                الاجمالي
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="font-weight-boldest">
                                            <td class="border-0 pl-0 pt-7 d-flex align-items-center">
                                                <!--begin::Symbol-->
                                                <!--end::Symbol-->
                                                عدد ساعات العمل
                                            </td>
                                            <td class="text-right pt-7 align-middle">{{$workHour=$item->getDurationInHour()}}</td>
                                            <td class="text-right pt-7 align-middle">{{$item->hour_price}} ر.س</td>
                                            <td class="text-primary pr-0 pt-7 text-right align-middle">{{$workHour*$item->hour_price}}
                                                ر.س
                                            </td>
                                        </tr>
                                        <tr class="font-weight-boldest border-bottom-0">
                                            <td class="border-top-0 pl-0 py-4 d-flex align-items-center">
                                                سعر القطع
                                            </td>
                                            <td class="border-top-0 text-right py-4 align-middle">1</td>
                                            <td class="border-top-0 text-right py-4 align-middle">{{$item->bought_price}}
                                                ر.س
                                            </td>
                                            <td class="text-primary border-top-0 pr-0 py-4 text-right align-middle">
                                                {{$item->bought_price}}ر.س
                                            </td>
                                        </tr>
                                        <tr class="font-weight-boldest border-bottom-0">
                                            <td class="border-top-0 pl-0 py-4 d-flex align-items-center">
                                                الطلعات
                                            </td>
                                            <td class="border-top-0 text-right py-4 align-middle">{{$item->bring_times}}</td>
                                            <td class="border-top-0 text-right py-4 align-middle">{{$item->price_pre_bring}}
                                                ر.س
                                            </td>
                                            <td class="text-primary border-top-0 pr-0 py-4 text-right align-middle">
                                                {{$item->bring_times*$item->price_pre_bring}} ر.س
                                            </td>
                                        </tr>
                                        @if($item->check_price)
                                            <tr class="font-weight-boldest border-bottom-0">
                                                <td class="border-top-0 pl-0 py-4 d-flex align-items-center">
                                                    الطلعات
                                                </td>
                                                <td class="border-top-0 text-right py-4 align-middle">1</td>
                                                <td class="border-top-0 text-right py-4 align-middle">{{$item->check_price}}
                                                    ر.س
                                                </td>
                                                <td class="text-primary border-top-0 pr-0 py-4 text-right align-middle">
                                                    {{$item->check_price}} ر.س
                                                </td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice body-->
                        <!-- begin: Invoice footer-->
                        <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0 mx-0">
                            <div class="col-md-10">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="font-weight-bold text-muted text-uppercase">طريقة الدفع</th>
                                            <th class="font-weight-bold text-muted text-uppercase">حالة الدفع</th>
                                            <th class="font-weight-bold text-muted text-uppercase">تاريخ الدفع</th>
                                            <th class="font-weight-bold text-muted text-uppercase text-right">المبلغ
                                                الاجمالي
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="font-weight-bolder">
                                            <td>{{@$item->payment->getTrans('title')}}</td>
                                            <td>{{$item->is_pay_complete?"مدفوع":"غير مدفوع"}}</td>
                                            <td>{{@$item->complete_at->format('Y-m-d h:i:s a')}}</td>
                                            <td class="text-primary font-size-h3 font-weight-boldest text-right">
                                                {{$item->total_price}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice footer-->
                        <!-- begin: Invoice action-->
                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-10">
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-light-primary font-weight-bold"
                                            onclick="window.print();">طباعة
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice action-->
                    </div>
                    <!--end::Tab-->
                @endif
                @if($item->bills->count())
                    <div class="tab-pane px-7" id="order_images" role="tabpanel">
                        <!--begin::Products-->
                        <div class="row">
                            <!--begin::Product-->
                            @foreach($item->bills as $bill)
                                <div class="col-md-4 col-xxl-4 col-lg-12">
                                    <!--begin::Card-->
                                    <div class="card card-custom card-shadowless">
                                        <div class="card-body p-0">
                                            <!--begin::Image-->
                                            <div class="overlay">
                                                <div class="overlay-wrapper rounded bg-light text-center">
                                                    <a target="_blank" href="{{$bill->getImage('high')}}"
                                                       class="btn font-weight-bolder btn-sm btn-primary mr-2">
                                                        <img src="{{$bill->getImage()}}" alt="" class="mw-100 w-200px"/>
                                                    </a>
                                                </div>
                                                <div class="overlay-layer">
                                                    <a target="_blank" href="{{$bill->getImage('high')}}"
                                                       class="btn font-weight-bolder btn-sm btn-primary mr-2">مشاهدة</a>
                                                </div>
                                            </div>
                                            <!--end::Image-->
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <!--end::Product-->
                            @endforeach
                        </div>
                        <!--end::Products-->
                    </div>
                @endif
            </div>
        </div>
        <!--begin::Card body-->

        @endsection
        @include('admin.base.map',['lat'=>$item->lat,'lng'=>$item->lng,'enableClick'=>false,'showEvent'=>true])
        @push('scripts')
            <script>
                $('#status_id').change(function () {
                    if ($(this).val() == {{\App\Models\OrderStatus::CANCEL}}) {
                        $('#cancel_reason').show();
                        $('#cancel_reason select').attr('required', true);
                    } else {
                        $('#cancel_reason').hide();
                        $('#cancel_reason select').attr('required', false);
                    }
                }).change();
                $('#cancel_reason_id').change(function () {
                    if ($(this).val() == 0) {
                        $('#cancel_reason_other').show();
                        $('#cancel_reason_other input').attr('required', true);
                    } else {
                        $('#cancel_reason_other').hide();
                        $('#cancel_reason_other input').attr('required', false);
                    }
                }).change();
                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    if ($(this).attr('href') == '#order_provider')
                        initMap();
                })
            </script>

    @endpush


