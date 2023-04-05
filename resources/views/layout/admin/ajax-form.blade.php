<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function ajaxForm(obj) {
        $(obj).find('.loader,.loader-al').show();
        $(obj).find('[type=submit]').attr('disabled', true);
        $(obj).find('[type=submit]').addClass('loading');

        let method = $(obj).attr('method');

        // if ($(obj).find('[name=_method]').length)
        //     method = $(obj).find('[name=_method]').val();
        var formData = new FormData(obj);

        let  imageoption = {
            contentType: false,
            processData: false,
        };

        // if(method='put') {
        //     formData = $(obj).serialize();
        //     imageoption={};
        // }

        $.ajax({
            url: $(obj).attr('action'),
            method: method,
            data: formData,
            cache:false,
           ...imageoption
        }).done(function (data) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': data.csrf
                }
            });

            if (data.status ) {
                if (data.msg) {
                    if (typeof data.title != 'undefined')
                        showMsg(data.title, data.msg, data.redirect_to);
                    else
                        showMsg('<?php echo e(__('تم')); ?>', data.msg, data.redirect_to);
                }

                if ($(obj).data('clear') != 'no' && data.clear != 'no')
                    $(obj).find('input,textarea').not('.readonly,.notchange').val('');

                if ($(obj).data('callback')) {
                    var callback = $(obj).data('callback');
                    window[callback](data, $(obj));
                }
            } else {
                showMsgError('<?php echo e(__('خطأ')); ?>', data.msg);
            }
        }).fail(function (data) {
            ajaxFail(data);
        }).always(function () {
            $(obj).find('.loader,.loader-al').hide();
            $(obj).find('[type=submit]').attr('disabled', false);
            $(obj).find('[type=submit]').removeClass('loading');
        })

        return false;

    }

    function ajaxFail(data) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': data.csrf
            }
        });
        var message;
        var statusErrorMap = {
            '0': "الرجاء التأكد من الاتصال بالانترنت",
            '400': "Server understood the request, but request content was invalid.",
            '401': "Unauthorized access.",
            '403': "Forbidden resource can't be accessed.",
            '500': "Internal server error.",
            '503': "Service unavailable."
        };
        if (!data.status) {
            message = statusErrorMap[data.status];
            if (!message) {
                message = "Unknown Error \n.";
            }
            showMsgError('<?php echo e(__('خطأ')); ?>', message);

        } else if (data.status == 422) {
            var html = '<ul style="    list-style: circle;">';
            responseJSON = JSON.parse(data.responseText);
            $.each(responseJSON.errors, function (index, value) {
                html += "<li style='font-size: 13px;text-align:right;padding-bottom: 5px'>" + value + "</li>";
            });
            html += "</ul";

            showMsgError('<?php echo e(__('خطأ في البيانات المدخلة')); ?>', html);


        } else {
            showMsgError('<?php echo e(__('خطأ')); ?>', '<?php echo e(__('حصل خطأ فني، قم بالتواصل مع الدعم الفني')); ?>');

        }
    }

    $('.ajax-form').submit(function (e) {
        e.preventDefault();
        obj = this;
        if (!$(this).valid())
            return false;
        ajaxForm(obj)
    })

    function ajaxRequest(obj) {
        obj.find('.loader,.loader-al').show();
        obj.attr('disabled', true);

        let method = obj.attr('method') ? obj.attr('method') : "GET";
        $.ajax({
            url: obj.attr('href'),
            method: method,
            dataType: "json"
        }).done(function (data) {
            if (data.status == 'success') {
                toastr.success(data.msg ? data.msg : "تم تنفيذ المهمة");
                if (obj.data('callback')) {
                    var callback = obj.data('callback');
                    window[callback](data, obj);
                }
            }else
                toastr.error(data.msg?data.msg:"حصلت مشكلة اثناء تنفقذ المهمة")
        }).fail(function (data) {
            ajaxFail(data);
        }).always(function () {
            obj.find('.loader,.loader-al').hide();
            obj.attr('disabled', false);
        });
    }

</script>
<?php /**PATH /var/www/laravel8/whatsapp/resources/views/layout/admin/ajax-form.blade.php ENDPATH**/ ?>
