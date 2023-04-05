<form action="{{route('admin.logout')}}" method="post" class="hidden logout-form">
    @csrf
</form>

<style>
    .swal2-height-auto{
        padding-right:0 !important;
    }
</style>
<script>
    function showLoader(obj) {
        obj.append('<i class="fas fa-spinner fa-spin link-loader"></i>');
    }

    function hideLoader(obj) {
        obj.find('.link-loader').remove();
    }


    $('body').on('click','.confirm',function (e){
        e.preventDefault();
        let linkConfirm=$(this).attr('href');

        Swal.fire({
            title: 'هل انت متأكد من هذه العملية',
            showDenyButton: true,
            confirmButtonText: `نعم`,
            denyButtonText: `الغاء`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.get(linkConfirm).done(function (data){
                    if(data.status){
                        toastr.success('تم الحفظ بنجاح');
                        datatableTable.reload();
                    }else
                        toastr.error(data.msg);
                }).fail(function (data){
                    ajaxFail(data);
                });
            }
        })
    })
    var showMsgError = function (title, msg) {

        swal.fire({
            html: msg,
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "تم",
            customClass: {
                confirmButton: "btn font-weight-bold btn-light-primary"
            }
        }).then(function () {
            KTUtil.scrollTop();
        });
    }

    function showMsg(title, msg, redirect_to) {

        // swal.fire({
        //     text: msg,
        //     icon: "success",
        //     buttonsStyling: false,
        //     confirmButtonText: "تم",
        //     customClass: {
        //         confirmButton: "btn font-weight-bold btn-light-primary"
        //     }
        // }).then(function () {
        toastr.success(msg);
        if (typeof redirect_to != 'undefined')
            setTimeout(function () {
                window.location.replace(redirect_to);
            }, 1500)
        // });
    }

    $('.logout').click(function (e){
        e.preventDefault();
        $('.logout-form').submit();
    })

</script>
