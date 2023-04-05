@extends('admin.base.index')


{{--@php($options=['edit'=>true,'destroy'=>true])--}}
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
