{{-- Extends layout --}}
@extends('layout.admin.default')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row">
        @include('admin.pages.dashboard.state',['type'=>1,'title'=>'عدد المستخدمين','amount'=>\App\Models\User::customer()->count()])
        @include('admin.pages.dashboard.state',['type'=>2,'title'=>'عدد مزودي الخدمات','amount'=>\App\Models\User::provider()->count()])
        @include('admin.pages.dashboard.state',['type'=>3,'title'=>'الطلبات النشطة','amount'=>\App\Models\Order::query()->status('in_progress')->count()])
        @include('admin.pages.dashboard.state',['type'=>4,'title'=>'عدد المكتملة','amount'=>\App\Models\Order::query()->status('finished')->count()])
    </div>
    <div class="row">

    <div class="col-lg-6 col-xxl-4">
        @include('admin.pages.dashboard._recent_orders', ['class' => 'card-stretch gutter-b','orders'=>\App\Models\Order::latest()->with('provider','user')->where('created_at','>',\Carbon\Carbon::now()->subDays(5))->limit(5)->get()])
    </div>

{{--    <div class="col-lg-6 col-xxl-4">--}}
{{--        @include('pages.widgets._widget-3', ['class' => 'card-stretch card-stretch-half gutter-b'])--}}
{{--        @include('pages.widgets._widget-4', ['class' => 'card-stretch card-stretch-half gutter-b'])--}}
{{--    </div>--}}

{{--    <div class="col-lg-6 col-xxl-4 order-1 order-xxl-1">--}}
{{--        @include('pages.widgets._widget-5', ['class' => 'card-stretch gutter-b'])--}}
{{--    </div>--}}

    <div class="col-xxl-8 order-2 order-xxl-1">
        @include('admin.pages.dashboard._latst_provider', ['class' => 'card-stretch gutter-b','providers'=>\App\Models\User::provider()->latest()->with('services')->where('created_at','>',\Carbon\Carbon::now()->subDays(50))->limit(10)->get()])
    </div>

{{--    <div class="col-lg-6 col-xxl-4 order-1 order-xxl-2">--}}
{{--        @include('pages.widgets._widget-7', ['class' => 'card-stretch gutter-b'])--}}
{{--    </div>--}}

{{--    <div class="col-lg-6 col-xxl-4 order-1 order-xxl-2">--}}
{{--        @include('pages.widgets._widget-8', ['class' => 'card-stretch gutter-b'])--}}
{{--    </div>--}}

{{--    <div class="col-lg-12 col-xxl-4 order-1 order-xxl-2">--}}
{{--        @include('pages.widgets._widget-9', ['class' => 'card-stretch gutter-b'])--}}
{{--    </div>--}}


@endsection

{{-- Scripts Section --}}
@push('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endpush
