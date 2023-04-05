
@extends('admin.base.index',['removeCreate'=>true])
@php($options=['destroy'=>true])
@section('column')
    <script>
        let column = [
            {
                field: 'title',
                title: 'الاسم',
            },

            {
                field: 'translates',
                title: 'الترجمة',
                sortable: false,
            },
            {
                field: 'status',
                title: 'الحالة',
                autoHide: false,
                // callback function support for column rendering
                template: function (row) {
                    return '<span class="switch switch-outline switch-icon switch-success">\
                        <label>\
                        <input type="checkbox" class="status" data-action="payments" data-id="'+row.id+'" '+(row.status?"checked":"")+'/>\
                        <span></span>\
                </label>\
                </span>';
                },
            },

        ]

    </script>
@endsection
