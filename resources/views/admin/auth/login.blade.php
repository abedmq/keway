@extends('layout.admin.auth')


@section('content')
    <!--begin::Login-->
    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
        <!--begin::Aside-->
        <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
            <!--begin::Aside Top-->
            <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                <!--begin::Aside header-->
                <a href="#" class="text-center mb-10">
                    <img src="media/logos/logo-letter-1.png" class="max-h-70px" alt=""/>
                </a>
                <!--end::Aside header-->
                <!--begin::Aside title-->
                <h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">Discover
                    Amazing Metronic
                    <br/>with great build tools</h3>
                <!--end::Aside title-->
            </div>
            <!--end::Aside Top-->
            <!--begin::Aside Bottom-->
            <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center"
                 style="background-image: url(media/svg/illustrations/login-visual-1.svg)"></div>
            <!--end::Aside Bottom-->
        </div>
        <!--begin::Aside-->
        <!--begin::Content-->
        <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <!--begin::Content body-->
            <div class="d-flex flex-column-fluid flex-center">
                <!--begin::Signin-->
                <div class="login-form login-signin">
                    <!--begin::Form-->
                    <form class="form" id="kt_login_signin_form"
                          action="{{route('admin.login')}}" method="post">
                    @csrf
                    <!--begin::Title-->
                        <div class="pb-13 pt-lg-0 pt-5">
                            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">
                                مرحبا بك في لوحة التحكم
                            </h3>
                        </div>
                        <!--begin::Title-->
                        <!--begin::Form group-->
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">البريد الإلكتروني</label>
                            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="email"
                                   name="email" autocomplete="off"/>
                        </div>
                        <!--end::Form group-->
                        <!--begin::Form group-->
                        <div class="form-group">
                            <div class="d-flex justify-content-between mt-n5">
                                <label class="font-size-h6 font-weight-bolder text-dark pt-5">كلمة المرور</label>
                            </div>
                            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg"
                                   type="password"
                                   name="password" autocomplete="off"/>
                        </div>
                        <!--end::Form group-->
                        <!--begin::Action-->
                        <div class="pb-lg-0 pb-5">
                            <button type="submit"
                                    class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                                تسجيل الدخول
                            </button>

                        </div>
                        <!--end::Action-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Signin-->
            </div>
            <!--end::Content body-->
            <!--begin::Content footer-->
            <div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
                <div class="text-dark-50 font-size-lg font-weight-bolder mr-10">
                    <span class="mr-1">2021©</span>
                    <a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">Keenthemes</a>
                </div>
                <a href="#" class="text-primary font-weight-bolder font-size-lg">Terms</a>
                <a href="#" class="text-primary ml-5 font-weight-bolder font-size-lg">Plans</a>
                <a href="#" class="text-primary ml-5 font-weight-bolder font-size-lg">Contact Us</a>
            </div>
            <!--end::Content footer-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Login-->
@endsection

@push('scripts')
    <script>
        var validation = FormValidation.formValidation(KTUtil.getById('kt_login_signin_form'), {
            fields: {
                email: {
                    validators: {
                        notEmpty: {
                            message: 'البريد الألكتروني مطلوب'
                        },
                        emailAddress: {
                            message: 'يجب ان يكون بريد الكتروني'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'كلمة المرور مطلوبة',
                        }
                    }
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                // submitButton: new FormValidation.plugins.SubmitButton(),
                // defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                bootstrap: new FormValidation.plugins.Bootstrap()
            }
        });


        $('#kt_login_signin_form').on('submit', function (e) {
            e.preventDefault();
            obj=this
            validation.validate().then(function (status) {
                if (status == 'Valid') {
                    ajaxForm(obj);

                } else {

                    // swal.fire({
                    //     text: "Sorry, looks like there are some errors detected, please try again.",
                    //     icon: "error",
                    //     buttonsStyling: false,
                    //     confirmButtonText: "Ok, got it!",
                    //     customClass: {
                    //         confirmButton: "btn font-weight-bold btn-light-primary"
                    //     }
                    // }).then(function () {
                    // });
                    KTUtil.scrollTop();
                }
            });
        });
    </script>
@endpush
