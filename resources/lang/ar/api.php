<?php

return [

    'success' => 'تم الارسال بنجاح',
    'created' => 'تم الانشاء بنجاح',
    'updated' => 'تم التعديل بنجاح',
    'deleted' => 'تم الحذف بنجاح',

    'logout'                    => 'تم تسجيل الخروج بنجاح',
    'logout_all'                => 'تم تسجيل الخروج من جميع الأجهزة بنجاح',
    'wrong_mobile'              => 'الرجاء ادخال رقم جوال صحيح',
    'error_old_password'        => 'خطأ في كلمة المرور القديمة',
    'contact_send_before'       => 'تم ارسال رسالتك من قبل',
    'user_type_error'           => 'لا تمتلك صلاحية لاكمال الطلب',
    'provider_not_available'    => 'مزود الخدمة الذي اخترته غير متاح',
    'have_not_finish_order'     => 'لديك طلب/طلبات غير منتهي الرجاء اعادة الطلب بعد الانتهاء من طلبك الحالي',
    'area_not_support'          => 'لم يتم دعم متطقتك بعد',
    'cancel_denied'             => 'لا يمكنك الغاء هذا الطلب',
    'cancel_reason_required_if' => 'هذا الحقل مطلوب ',
    'cancel_success'            => 'تم الغاء الطلب بنجاح ',
    'order_approve_error'       => 'لا يمكنك قبول هذا الطلب ',
    'order_in_way_error'        => 'لا يمكنك بدأ هذا الطلب ',
    'order_arrive_error'        => 'لا يمكن تحدد وصل للمكان لهذا الطلب ',
    'order_check_error'         => 'لا يمكن بداية الفحص لهذا الطلب ',
    'checked_before'            => 'لقد قمت بتقيم الطلب من قبل ',
    'order_approve_success'     => 'تم قبول الطلب بنجاح ',
    'stop_order_error'          => 'هذا الطلب متوقف مسبقا ',
    'order_finish_error'        => 'لا يمكنك انهاء هذا الطلب ',
    'order_start_error'         => 'لا يمكنك بدأ العمل على هذا الطلب ',
    'order_pay_error'           => 'لا يمكنك دفع هذا الطلب ',
    'pay_error'                 => 'حصل خطأ اثناء عملية الدفع',
    'pay_not_cache'             => 'لا يمكن دفع هذا الطلب نقدا',
    'valid_order_amount'        => 'الرجاء ادخل المبلغ بشكل صحيح',
    'order_cannt_rate'          => 'لقد قيمت هذا الطلب من قبل',
    'order_add_bill_error'      => 'لا يمكن اضافة فواتير لهذا الطلب ',

    'new_order'         => [
        'title' => 'طلب جديد',
        'body'  => 'ارسل لك (:name) طلب لصيانة مشكلة ',
    ],
    'approve_order'     => [
        'title' => 'قبول الطلب',
        'body'  => 'قام (:name) بقبول الطلب الخاص بك ',
    ],
    'in_way_order'      => [
        'title' => 'الفني في الطريق',
        'body'  => 'في الطريق اليك (:name)  ',
    ],
    'arrive_order'      => [
        'title' => 'وصل الفني',
        'body'  => 'وصل الى المكان المطلوب (:name)  ',
    ],
    'check_order'       => [
        'title' => 'انتهى فحص المشكلة',
        'body'  => ' قام (:name) بانهاء فحص المشكلة لديك   ',
    ],
    'start_check_order' => [
        'title' => 'فحص المشكلة',
        'body'  => 'بدأ (:name) بفحص المشكلة لديك   ',
    ],
    'start_order'       => [
        'title' => 'بدأ الإصلاح',
        'body'  => 'بدأ  (:name) باصلاح المشكلة لديك  ',
    ],
    'stop_order'        => [
        'title' => 'تم ايقاف العمل',
        'body'  => 'قام (:name)  بايقاف العمل مؤقتا  ',
    ],
    'finish_order'        => [
        'title' => 'تم انهاء العمل',
        'body'  => 'قام (:name)  بإنهاء العمل  '.", سعر الخدمة هو :price"." ر.س",
    ],
    'pay_order_cache'   => [
        'title' => 'الدفع نقدا',
        'body'  => ' (:name) اختيار الدفع نقدا الرجاء استلام الملبغ المطلوب  ',
    ],
    'pay_order'         => [
        'title' => 'تم الدفع',
        'body'  => ' قام (:name) بالدفع عن طريق البطاقة   ',
    ],
    'rate_order'        => [
        'title' => 'تم تقيم طلبك',
        'body'  => 'قام (:name) بتقيم الطلب الخاص بك',
    ],
    'cancel_order'      => [
        'title' => 'الغاء الطلب',
        'body'  => 'بالغاء الطلب  (:name) قام ' . ' بسبب :reason',
    ],
];
