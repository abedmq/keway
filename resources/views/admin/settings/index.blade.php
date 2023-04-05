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
                        <a class="nav-link active" data-toggle="tab" href="#general">
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
                            <span class="nav-text font-size-lg">اعدادات عامة</span>
                        </a>
                    </li>

                    <!--begin::Item-->
                    <li class="nav-item mr-3">
                        <a class="nav-link" data-toggle="tab" href="#about_us">
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
                            <span class="nav-text font-size-lg">من نحن</span>
                        </a>
                    </li>

                    <!--begin::Item-->
                    <li class="nav-item mr-3">
                        <a class="nav-link" data-toggle="tab" href="#term_and_condition">
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
                            <span class="nav-text font-size-lg">الشروط والاحكام</span>
                        </a>
                    </li>

                    <!--begin::Item-->
                    <li class="nav-item mr-3">
                        <a class="nav-link" data-toggle="tab" href="#privacy">
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
                            <span class="nav-text font-size-lg">الخصوصية</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form action="{{route('admin.settings.update')}}" method="post" class="form-validate "
              enctype="multipart/form-data" data-clear="no">
            @csrf

            <div class="card-body">
                <div class="tab-content">
                    <!--begin::Tab-->
                    <div class="tab-pane show active px-7" id="general" role="tabpanel">
                        <!--begin::Form-->
                        <div class="form-group">
                            <label for="name">الاسم <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="ادخل الاسم"
                                   value="{{settings('name')}}" required/>
                            @if($errors->has('name'))
                                <label for="" style="color:red;">{{$errors->first('name')}}</label>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">الوصف <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="description" name="description"
                                   placeholder="ادخل الوصف"
                                   value="{{settings('description')}}" required/>
                            @if($errors->has('description'))
                                <label for="" style="color:red;">{{$errors->first('description')}}</label>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="keywords">كلمات مفتاحية <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="keywords" name="keywords"
                                   placeholder="كلمات مفتاحية"
                                   value="{{settings('keywords')}}" required/>
                            @if($errors->has('keywords'))
                                <label for="" style="color:red;">{{$errors->first('keywords')}}</label>
                            @endif
                            <span>يجب الفصل بين الكلمات بفاصلة (,)</span>
                        </div>


                        <div class="form-group">
                            <label for="email">البريد الاكتروني <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="email" name="email"
                                   placeholder="ادخل البريد الاكتروني"
                                   value="{{settings('email')}}" required/>
                            @if($errors->has('email'))
                                <label for="" style="color:red;">{{$errors->first('email')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="who_us">من نحن <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="who_us" name="who_us" placeholder="ادخل من نحن"
                                   value="{{settings('who_us')}}" required/>
                            @if($errors->has('who_us'))
                                <label for="" style="color:red;">{{$errors->first('who_us')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="copyright">حقوق الطباعة <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="copyright" name="copyright"
                                   placeholder="ادخل حقوق الطباعة"
                                   value="{{settings('copyright')}}" required/>
                            @if($errors->has('copyright'))
                                <label for="" style="color:red;">{{$errors->first('copyright')}}</label>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">الشعار <span class="text-danger">*</span></label>
                            <input type="file" accept="image/*" class="form-control image-input" name="logo"
                                   value="" {{settings('logo')?"":"required"}}/>
                            <img src="{{get_images_group(settings("logo"))['thump']??''}}" width="300px" class="blah"
                                 alt="">
                            @if($errors->has('logo'))
                                <label for="" style="color:red;">{{$errors->first('logo')}}</label>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="card_image">صورة الخلفية <span class="text-danger">*</span></label>
                            <input type="file" accept="image/*" class="form-control image-input" name="image"
                                {{settings('image')?"":"required"}}/>
                            <img src="{{get_images_group(settings("image"))['thump']??''}}" width="300px" class="blah"
                                 alt="">
                            @if($errors->has('image'))
                                <label for="" style="color:red;">{{$errors->first('image')}}</label>
                            @endif
                        </div>


                        <!--end::Form-->
                    </div>
                    <div class="tab-pane  px-7" id="about_us" role="tabpanel">
                        <div class="form-group">
                            <label for="name">من نحن (عربي) <span class="text-danger">*</span></label>

                            <textarea type="text" class="form-control text-editor" id="about_us_ar" name="about_us_ar"
                                      placeholder="من نحن"
                                      required>
                                {{settings('about_us_ar')}}
                            </textarea>
                            @if($errors->has('about_us_ar'))
                                <label for="" style="color:red;">{{$errors->first('about_us_ar')}}</label>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="name">من نحن (English) <span class="text-danger">*</span></label>

                            <textarea type="text" class="form-control text-editor" id="about_us_en" name="about_us_en"
                                      placeholder="من نحن"
                                      required>
                                {{settings('about_us_en')}}
                            </textarea>
                            @if($errors->has('about_us_en'))
                                <label for="" style="color:red;">{{$errors->first('about_us_en')}}</label>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane  px-7" id="term_and_condition" role="tabpanel">
                        <div class="form-group">
                            <label for="name">الشروط والأحكام (عربي) <span class="text-danger">*</span></label>

                            <textarea type="text" class="form-control text-editor" id="term_and_condition_ar" name="term_and_condition_ar"
                                      placeholder="الشروط والأحكام"
                                      required>
                                {{settings('term_and_condition_ar')}}
                            </textarea>
                            @if($errors->has('term_and_condition_ar'))
                                <label for="" style="color:red;">{{$errors->first('term_and_condition_ar')}}</label>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="name">الشروط والأحكام (English) <span class="text-danger">*</span></label>

                            <textarea type="text" class="form-control text-editor" id="term_and_condition_en" name="term_and_condition_en"
                                      placeholder="الشروط والأحكام"
                                      required>
                                {{settings('term_and_condition_en')}}
                            </textarea>
                            @if($errors->has('term_and_condition_en'))
                                <label for="" style="color:red;">{{$errors->first('term_and_condition_en')}}</label>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane  px-7" id="privacy" role="tabpanel">
                        <div class="form-group">
                            <label for="name">الخصوصية (عربي) <span class="text-danger">*</span></label>

                            <textarea type="text" class="form-control text-editor" id="privacy_ar" name="privacy_ar"
                                      placeholder="الخصوصية"
                                      required>
                                {{settings('privacy_ar')}}
                            </textarea>
                            @if($errors->has('privacy_ar'))
                                <label for="" style="color:red;">{{$errors->first('privacy_ar')}}</label>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="name">الخصوصية (English) <span class="text-danger">*</span></label>

                            <textarea type="text" class="form-control text-editor" id="privacy_en" name="privacy_en"
                                      placeholder="الخصوصية"
                                      required>
                                {{settings('privacy_en')}}
                            </textarea>
                            @if($errors->has('privacy_en'))
                                <label for="" style="color:red;">{{$errors->first('privacy_en')}}</label>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">حفظ
                    <i class="fa fa-spinner fa-spin loader" style="display: none;"></i>
                </button>
                <button type="reset" class="btn btn-secondary">الغاء</button>
            </div>
        </form>
    </div>
    <!--end::Card-->
@endsection

@push('scripts')
    <script src="{{asset('plugins/custom/ckeditor5/ckeditor.js')}}"></script>

    <script>
        window.ck_img_upload_url = '{{route('admin.images.upload.ckeditor')}}';
        window.ck_img_path = '';
        $('.text-editor').each(function () {
            if (!this.id) {
                this.id = this.name;
            }
            CKEDITOR.timestamp = '7';


            CKEDITOR.replace(this.id, {
                language: 'ar',
                height: $(this).attr('height') ? $(this).attr('height') : 750
            });

        });
        CKEDITOR.editorConfig = function (config) {
            config.language = 'ar';
            config.uiColor = '#F7B42C';
            config.height = 300;
            config.toolbarCanCollapse = true;
        };
    </script>
@endpush

