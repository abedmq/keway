@extends('admin.base.index',['removeCreate'=>true])

@section('filter')

@endsection
@php($options=['edit'=>false,'destroy'=>false])
@section('column')
    <script>
        let column = [
            {
                field: 'provider.name',
                title: 'الاسم',
            },
            {
                field: 'amount',
                title: 'المبلغ',
            },
            {
                field: 'order.id',
                title: 'الطلب',
                template:function (raw){
                    return "<a href='admin/orders/"+raw.order.id+"'>"+(raw.order.id?raw.order.id:"--")+"</a>";
                }
            },
            {
                title: 'النوع',
                field: 'type_text',
            },
        ]
    </script>
@endsection
