{{-- List Widget 9 --}}

<div class="card card-custom {{ @$class }}">
    {{-- Header --}}
    <div class="card-header align-items-center border-0 mt-4">
        <h3 class="card-title align-items-start flex-column">
            <span class="font-weight-bolder text-dark">أخر الطلبات</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">عرض اخر {{$orders->count()}} طلبات</span>
        </h3>
        <div class="card-toolbar">
            <div class="dropdown dropdown-inline">
                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ki ki-bold-more-ver"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- Body --}}
    <div class="card-body pt-4">
        <div class="timeline timeline-6 mt-3">
        @foreach($orders as $order)
            <!--begin::Item-->
            <div class="timeline-item align-items-start">
                <!--begin::Label-->
                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">{{$order->created_at->diffForHumans()}}</div>
                <!--end::Label-->
                <!--begin::Badge-->
                <div class="timeline-badge">
                    <i class="fa fa-genderless text-warning icon-xl"></i>
                </div>
                <!--end::Badge-->
                <!--begin::Text-->
                <div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">{{@$order->user->name}} | {{@$order->provider->name}}</div>
                <!--end::Text-->
            </div>
            <!--end::Item-->
        @endforeach
             </div>
    </div>
</div>
