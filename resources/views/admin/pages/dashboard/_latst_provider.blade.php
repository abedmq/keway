{{-- Advance Table Widget 2 --}}

<div class="card card-custom {{ @$class }}">
    {{-- Header --}}
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">مزودي الخدمات</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">عرض آخر مزودي الخدمات</span>
        </h3>
    </div>

    {{-- Body --}}
    <div class="card-body pt-3 pb-0">
        {{-- Table --}}
        <div class="table-responsive">
            <table class="table table-borderless table-vertical-center">
                <thead>
                <tr>
                    <th class="p-0" style="width: 50px"></th>
                    <th class="p-0" style="min-width: 200px">الاسم</th>
                    <th class="p-0" style="min-width: 100px">تفعيل الجوال</th>
                    <th class="p-0" style="min-width: 125px">الخدمات</th>
                    <th class="p-0" style="min-width: 110px">اكمال الحساب</th>
                </tr>
                </thead>
                <tbody>
                @foreach($providers as $provider)
                    <tr>
                        <td class="pl-0 py-4">
                            <div class="symbol symbol-50 symbol-light mr-1">
                                <span class="symbol-label">
                                    <img src="{{ $provider->getImage() }}" class="h-50 align-self-center"/>
                                </span>
                            </div>
                        </td>
                        <td class="pl-0">
                            <a href="#"
                               class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$provider->name}}</a>
                            <div>
                                {{$provider->mobile}}
                            </div>
                        </td>
                        <td class="">
                            @if($provider->mobile_verified_at)
                                <span class="label label-success label-pill label-inline ">مفعل</span>
                            @else
                                <span class="label label-info label-pill label-inline ">عير معفل</span>
                            @endif
                        </td>
                        <td class="">
                            <span class="text-muted font-weight-500">
                            {{implode(',',$provider->services->pluck('title')->toArray())}}
                            </span>
                        </td>
                        <td class="">
                            @if($provider->is_complete)
                                <span class="label label-lg label-light-primary label-inline">مكتمل</span>
                            @else
                                <span class="label label-lg label-light-warning label-inline">غير مكتمل</span>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
