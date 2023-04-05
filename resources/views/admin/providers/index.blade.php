@extends('admin.base.index')

@section('filter')
    {{--    <div class="col-md-4 my-2 my-md-0">--}}
    {{--        <div class="d-flex align-items-center">--}}
    {{--            <label class="mr-3 mb-0 d-none d-md-block">الحالة:</label>--}}
    {{--            <select class="form-control" id="kt_datatable_search_status">--}}
    {{--                <option value="">All</option>--}}
    {{--                <option value="1">Pending</option>--}}
    {{--                <option value="2">Delivered</option>--}}
    {{--                <option value="3">Canceled</option>--}}
    {{--                <option value="4">Success</option>--}}
    {{--                <option value="5">Info</option>--}}
    {{--                <option value="6">Danger</option>--}}
    {{--            </select>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <div class="col-md-4 my-2 my-md-0">--}}
    {{--        <div class="d-flex align-items-center">--}}
    {{--            <label class="mr-3 mb-0 d-none d-md-block">النوع:</label>--}}
    {{--            <select class="form-control" id="kt_datatable_search_type">--}}
    {{--                <option value="">All</option>--}}
    {{--                <option value="1">Online</option>--}}
    {{--                <option value="2">Retail</option>--}}
    {{--                <option value="3">Direct</option>--}}
    {{--            </select>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection

@php($options=[
    'actions'=>[['path'=>'profit','title'=>'الأرباح','color'=>'success','svg'=>'<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M13.5,6 C13.33743,8.28571429 12.7799545,9.78571429 11.8275735,10.5 C11.8275735,10.5 12.5,4 10.5734853,2 C10.5734853,2 10.5734853,5.92857143 8.78777106,9.14285714 C7.95071887,10.6495511 7.00205677,12.1418252 7.00205677,14.1428571 C7.00205677,17 10.4697177,18 12.0049375,18 C13.8025422,18 17,17 17,13.5 C17,12.0608202 15.8333333,9.56082016 13.5,6 Z" fill="#000000"/><path d="M9.72075922,20 L14.2792408,20 C14.7096712,20 15.09181,20.2754301 15.2279241,20.6837722 L16,23 L8,23 L8.77207592,20.6837722 C8.90818997,20.2754301 9.29032881,20 9.72075922,20 Z" fill="#000000" opacity="0.3"/></g></svg>']
]])
@section('column')
    <script>
        let column = [

            {
                field: 'mobile',
                title: 'رقم الجوال',
            },
            {
                field: 'name',
                title: 'الاسم',
            },

            {
                field: 'language.name',
                title: 'اللغة',
                sortable: false,
            },
            {
                field: 'wallet',
                title: 'المستحقات',
            },
            {
                field: 'services',
                title: 'الخدمات',
                template: function (row) {
                    let val = row.services.map(function (value, index) {
                        return value['title'];
                    }).join(',');
                    return val ? val : '---';
                }

            },
            {
                title: 'تفعيل الجوال',
                field: 'mobile_verified_at',
                template: function (row) {
                    return row.mobile_verified_at ? "<span class='badge badge-success'>مفعل</span>" : " <span class='badge badge-warning'>غير مفعل</span>";
                }
            },
            {
                field: 'status',
                title: 'الحظر',
                autoHide: false,
                // callback function support for column rendering
                template: function (row) {
                    return '<span class="switch switch-outline switch-icon switch-danger">\
                        <label>\
                        <input type="checkbox" class="status" data-action="users" data-id="' + row.id + '" ' + (row.status ? "" : "checked") + '/>\
                        <span></span>\
                </label>\
                </span>';
                },
            },
        ]
    </script>
@endsection
