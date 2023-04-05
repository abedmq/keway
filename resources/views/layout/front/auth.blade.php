<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="ar" dir="rtl">
<!--begin::Head-->
<head>
    <base href="{{url('')}}">
    <meta charset="utf-8"/>
    <title>{{settings('title')}}</title>
    <meta name="description" content="Singin page example"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="canonical" href="https://keenthemes.com/metronic"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="front/css/pages/login/login-3.rtl.css" rel="stylesheet" type="text/css"/>
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="front/plugins/global/plugins.bundle.rtl.css" rel="stylesheet" type="text/css"/>
    <link href="front/plugins/custom/prismjs/prismjs.bundle.rtl.css" rel="stylesheet" type="text/css"/>
    <link href="front/css/style.bundle.rtl.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="front/fonts/style.css">
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="front/media/logos/favicon.ico"/>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"
      class="header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-secondary-enabled page-loading">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Aside-->
        <div class="login-aside d-flex flex-column flex-row-auto">
            <!--begin::Aside Top-->
            <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                <!--begin::Aside header-->
                <a href="#" class="login-logo text-center pt-lg-25 pb-10">
                    <img src="{{settings('logo')}}/250" class="max-h-70px" alt=""/>
                </a>
                <!--end::Aside header-->
                <!--begin::Aside Title-->
                <h3 class="font-weight-bolder text-center font-size-h4 text-dark-50 line-height-xl">
                    تسجيل الدخول لموقع رسول
                    <br/></h3>
                <!--end::Aside Title-->
            </div>
            <!--end::Aside Top-->
            <!--begin::Aside Bottom-->
            <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center"
                 style="background-position-y: calc(100% + 5rem); background-image: url(front/media/svg/illustrations/login-visual-5.svg)"></div>
            <!--end::Aside Bottom-->
        </div>
        <!--begin::Aside-->
        <!--begin::Content-->
        <div class="login-content flex-row-fluid d-flex flex-column p-10">
            <!--begin::Top-->
        {{--            <div class="text-right d-flex justify-content-center">--}}
        {{--                <div class="top-signin text-right d-flex justify-content-end pt-5 pb-lg-0 pb-10">--}}
        {{--                    <span class="font-weight-bold text-muted font-size-h4">Having issues?</span>--}}
        {{--                    <a href="javascript:;" class="font-weight-bold text-primary font-size-h4 ml-2" id="kt_login_signup">Get--}}
        {{--                        Help</a>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        <!--end::Top-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-row-fluid flex-center">
                @yield('content')
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->
<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->

<script>
    var KTAppSettings = {
        "breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200},
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#1BC5BD",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#6993FF",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#F3F6F9",
                    "dark": "#212121"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#1BC5BD",
                    "secondary": "#ECF0F3",
                    "success": "#C9F7F5",
                    "info": "#E1E9FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#212121",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#ECF0F3",
                "gray-300": "#E5EAEE",
                "gray-400": "#D6D6E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#80808F",
                "gray-700": "#464E5F",
                "gray-800": "#1B283F",
                "gray-900": "#212121"
            }
        },
        "font-family": "Poppins"
    };
</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="front/plugins/global/plugins.bundle.js"></script>
<script src="front/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="front/js/scripts.bundle.min.js"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Scripts(used by this page)-->
{{--<script src="front/js/pages/custom/login/login-3.js"></script>--}}
<!--end::Page Scripts-->
<script>
    toastr.options = {
        "rtl": true,
        "direction": "rtl",
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-left",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@include('layout.admin.ajax-form')
@include('layout.admin.utilities')
@stack('scripts')
</body>
<!--end::Body-->
</html>