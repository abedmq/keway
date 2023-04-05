
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
        ]

    </script>
@endsection
