@extends('admin.base.index',['removeCreate'=>true])

@section('filter')

@endsection

@php($options=[
    'edit'=>false,
    'actions'=>[['path'=>'','class'=>'preview-message' ,'title'=>'عرض','color'=>'success','svg'=>'<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M13.5,6 C13.33743,8.28571429 12.7799545,9.78571429 11.8275735,10.5 C11.8275735,10.5 12.5,4 10.5734853,2 C10.5734853,2 10.5734853,5.92857143 8.78777106,9.14285714 C7.95071887,10.6495511 7.00205677,12.1418252 7.00205677,14.1428571 C7.00205677,17 10.4697177,18 12.0049375,18 C13.8025422,18 17,17 17,13.5 C17,12.0608202 15.8333333,9.56082016 13.5,6 Z" fill="#000000"/><path d="M9.72075922,20 L14.2792408,20 C14.7096712,20 15.09181,20.2754301 15.2279241,20.6837722 L16,23 L8,23 L8.77207592,20.6837722 C8.90818997,20.2754301 9.29032881,20 9.72075922,20 Z" fill="#000000" opacity="0.3"/></g></svg>']
]])
@section('column')
    <script>
        let column = [
            {
                field: 'user.name',
                title: 'اسم المستخدم',
                template: function (raw) {
                    return "<a href='admin/users?user_id=" + raw.user_id + "'>" + (raw.user.name ? raw.user.name : raw.user.mobile) + "</a>";
                }
            },
            {
                field: 'admin.name',
                title: 'اسم المشرف',
                template: function (raw) {
                    return raw.admin?raw.admin.name:'--';
                }
            },
            {
                field: 'message',
                title:'الرسالة'
            }
        ]
    </script>
@endsection

@push('scripts')
    <div class="modal bd-example-modal-lg" id="modal_preview" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تفاصيل الرسالة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('body').on('click','.preview-message',function (e){
            e.preventDefault();
            $.get($(this).attr('href'))
            .done(function (data){
                $('#modal_preview .modal-body').html(data);
                $('#modal_preview').modal('show');
            })
        })
    </script>

@endpush
