@extends('admin.base.index')
@section('column')
    <script>
        let column = [
            {
                field: 'title',
                title: 'الاسم',
            },
            {
                field: 'status',
                title: 'الحالة',
                autoHide: false,
                // callback function support for column rendering
                template: function (row) {
                    return '<span class="switch switch-outline switch-icon switch-success">\
                        <label>\
                        <input type="checkbox" class="status" data-action="cancels" data-id="' + row.id + '" ' + (row.status ? "checked" : "") + '/>\
                        <span></span>\
                </label>\
                </span>';
                },
            },
            {
                field: 'translates',
                title: 'الترجمة',
                sortable: false,
            },
        ]

    </script>
@endsection
