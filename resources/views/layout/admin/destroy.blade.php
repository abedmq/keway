<script>
    $('body').on('click', '.destroy', function (e) {
        e.preventDefault();
        let obj = $(this);

        Swal.fire({
            title: 'تأكيد الحذف',
            text: "هل انت متأكد من حذف هذا العنصر نهائيا",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'نعم,احذف',
            cancelButtonText: 'الغاء'
        }).then((result) => {
            if (result.isConfirmed) {
                showLoader(obj);
                $.ajax({
                    url: obj.attr('href'),
                    method: 'delete',
                    dataType: 'json'
                }).done(function (data) {

                    if (data.status ) {
                        showMsg('', data.msg ? data.msg : "تم الحذف بشكل نهائي");
                        datatableTable.reload();
                    } else {
                        showMsgError('', data.msg ? data.msg : 'حصلت مشكلة أثناء الخذف')
                    }
                }).fail(function (data) {
                    ajaxFail(data);
                }).always(function () {
                    hideLoader(obj);
                });
            }
        })


        return false;

    });
</script>
