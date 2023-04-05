<?php

namespace App\Models;

use App\Traits\ActivityTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{

    //

    public $timestamps = false;
    protected $fillable = ['key', 'value'];

    protected $primaryKey = 'key';
    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    const CHECKBOX_INPUT = [];

    static function addORUpdate($data)
    {
        foreach ($data as $key => $value) {
            if ($value != null)
                self::updateOrCreate([
                    'key' => $key,
                ], [
                    'key' => $key,
                    'value' => $value,
                ]);
        }
        Cache::forget('settings');
    }

    static function getMenu()
    {
        return [
            'general' => [__('اعدادات عامة'), 'index'],
        ];
    }

    static function getTabs($key = 'general')
    {
        $pages = [
            'general' => [
                'general_tb' => __('اعدادات عامة'),
                'social_tb' => __('الحسابات الاجتماعية'),
                'email_tb' => __('رسائل البريد الإلكتروني'),
                'tax' => __('الضرييبة'),
                'discount' => __('الخصم'),
                'upselling' => __('الخصم الافسام'),
                'cv' => __('السيرة الذاتية'),
                'intuit' => __('intuit'),
                'osarh' => __('عصارة'),
                'header_footer' => __('اضافات'),
                'marketing_campaigns' => __('الحملات التسويقية'),
            ],

        ];

        return $pages[$key] ?? [];
    }


    static function getParam($tab)
    {
        switch ($tab) {
            case 'general_tb':
                return [
                    ['logo', 'image', settings('logo'), __('شعار الموقع'), '', '', 'col-md-3'],
                    ['logo_ft', 'image', settings('logo_ft'), __('شعار الموقع فوتر'), '', '', 'col-md-3'],
                    ['logo_mobile', 'image', settings('logo_mobile'), __('شعار الموقع جوال'), '', '', 'col-md-3'],
                    ['icon', 'image', settings('icon'), __('ايقونة الموقع'), '', '', 'col-md-3'],
                    ['share_photo', 'image', settings('share_photo'), __('صورة المشاركة على السوشيال'), '', '', 'sharePhoto col-md-6'],
                    ['title', 'text', settings('title'), __('عنوان الموقع'), ''],
                    ['name', 'text', settings('name'), __('اسم الموقع'), ''],
                    ['hide_cv_export', 'checkbox', settings('hide_cv_export'), __('اخفاء استخراج السيرة الذاتية'), ''],
                    ['company_name', 'text', settings('company_name'), __('اسم الشركة'), ''],
                    ['description', 'textarea', settings('description'), __('نبذه عن الموقع'), ''],
                    ['keyword', 'tags', settings('keyword'), __('كلمات مفتاحية'), 'keyword'],
                    ['order_analysis_per_day', 'number', settings('order_analysis_per_day'), __('عدد التحليلات في اليوم'), ''],

                    ['SAR_to_USD', 'number', settings('SAR_to_USD'), __('سعر التحويل الى الدولار'), ''],
                    ['email', 'text', settings('email'), __('البريد الالكتروني'), ''],
                    //                    ['analysis_time', 'number', settings('analysis_time'), __('مدة التحليل'), ''],
                    ['address', 'text', settings('address'), __('العنوان'), ''],
                    ['mobile', 'text', settings('mobile'), __('رقم جوال'), ''],
                    ['copyright', 'text', settings('copyright'), __('نص الحقوق'), ''],
                    ['copyright_cv', 'text', settings('copyright_cv'), __('نص الحقوق السيرة الذاتية'), ''],
                    ['copyright_cv_order', 'text', settings('copyright_cv_order'), __('اكمال نص الحقوق في حال وجود تحليل للمستخدم'), ''],
                ];

            case  'social_tb' :
                return [
                    ['facebook', 'text', settings('facebook'), __('فيس بوك'), ''],
                    ['twitter', 'text', settings('twitter'), __('تويتر'), ''],
                    ['telegram', 'text', settings('telegram'), __('تيلغرام'), ''],
                    ['instagram', 'text', settings('instagram'), __('انستقرام'), ''],
                    ['youtube', 'text', settings('youtube'), __('يوتيوب'), ''],
                    ['whatsapp', 'text', settings('whatsapp'), __('واتس اب'), ''],
                    ['whatsapp_2', 'text', settings('whatsapp_2'), __('واتس اب للسفراء'), ''],
                    ['contact_email', 'text', settings('contact_email'), __('البريد الإلكتروني'), ''],
                ];

            case "email_tb":
                return [
                    ['email_activate_text', 'textarea', settings('email_activate_text'), __('نص ترحيبي للبريد الإلكتروني'), ''],
                    ['email_reset_text', 'textarea', settings('email_reset_text'), __('نص رسالة اعادة تعين كلمة المرور'), ''],
                    ['email_gift_text', 'textarea', settings('email_gift_text'), __('نص رسالة الهدية'), ''],
                ];
            case "tax":
                return [
                    ['tax_rate', 'number', settings('tax_rate'), __('قيمة الضريبة'), ''],
                    ['tax_number', 'number', settings('tax_number'), __('الرقم الضريبي'), ''],
                ];
            case "cv":
                return [
                    ['cv_popup_title', 'text', settings('cv_popup_title'), __('عنوان رسالة الانتهاء من السيرة الذاتية'), ''],
                    ['cv_popup_description', 'textarea', settings('cv_popup_description'), __('نص رسالة الانتهاء من السيرة الذاتية'), 'summernote'],
                    ['cv_popup_btn_text', 'text', settings('cv_popup_btn_text'), __('نص زر اليوب اب في السيرة الذاتية'), ''],
                    ['cv_popup_btn_url', 'url', settings('cv_popup_btn_url'), __('رابط زر اليوب اب في السيرة الذاتية'), ''],
                    ['cv_version', 'number', settings('cv_version'), __('اصدار السيرة الذاتية'), ''],
                ];
            case "discount":
                return [
                    ['all_discount_rate', 'number', settings('all_discount_rate'), __('قيمة الخصم على اختيار كل الاقسام'), ''],
                    ['all_discount_rate_couples', 'number', settings('all_discount_rate_couples'), __('قيمة الخصم على الاقسام الزوجية'), ''],
                    ['share_discount_rate', 'number', settings('share_discount_rate'), __('قيمة الخصم عند استخدام رابط الصديق'), ''],
                    ['cv_discount', 'number', settings('cv_discount'), __('قيمة الخصم عند اكمال السيرة الذاتية'), ''],
                    ['reorder', 'number', settings('reorder'), __('الخصم على اعادة التحليل'), ''],
                    ['discount_3_order', 'number', settings('discount_3_order'), __('الخصم على شراء ثلاث طلبات'), ''],
                    ['discount_4_order', 'number', settings('discount_4_order'), __('الخصم على شراء اربعة طلبات'), ''],
                    ['discount_5_more_order', 'number', settings('discount_5_more_order'), __('الخصم على شراء خمسة طلبات او أكثر'), ''],


                ];
            case "upselling":
                return [
//                    ['upselling_categories', 'select', Category::pluck('name', 'id'), true, settings('upselling_categories'), __('الطلبات الاساسية للخصم'), ''],
                    ['upselling_discount_rate', 'number', settings('upselling_discount_rate'), __('نسبة خصم الاب سلنق'), ''],
                ];
            case "points":
                return [
                    ['register_points', 'number', settings('register_points'), __('عدد النقاط عند التسجيل'), ''],
                    ['points_friend', 'number', settings('points_friend'), __('نسبة النقاط عند التسويق عبر الرابط'), ''],
                    ['points_price', 'number', settings('points_price'), __('نسبة النقاط من قيمة المشتريات'), ''],
                    ['points_min_withdraw', 'number', settings('points_min_withdraw'), __('اقل قيمة لسحب النقاط'), ''],
                    ['points_min_buy', 'number', settings('points_min_buy'), __('اقل قيمة للشراء بالنقاط'), ''],
                    ['points_to_SAR', 'number', settings('points_to_SAR'), __('عدد النقاط لكل ريال'), ''],
                ];
            case "intuit":
                return [
                    ['intuit', 'href', route('admin.intuit.updateRefreshToken'), 'تحديث مفتاح intuit'],
                ];
            case "header_footer":
                return [
                    ['header', 'textarea', settings('header'), 'كود الهيدر', ''],
                    ['footer', 'textarea', settings('footer'), 'كود الفوتر', ''],
                ];
            case "osarh":
                return [
                    ['osarh_text_weakness', 'text', settings('osarh_text_weakness'), 'نص لوصف رابط عصارة في نقاط الضعف', ''],
                    ['osarh_url_weakness', 'url', settings('osarh_url_weakness'), 'رابط عصارة في نقاط الضعف', ''],
                ];
            case'marketing_campaigns':
                return [
                    ['hide_promo', 'checkbox', settings('hide_promo'), __('اخفاء كود الخصم'), ''],
                    ['hide_upselling', 'checkbox', settings('hide_upselling'), __('اخفاء الاب سيلنق بعد اختيار الباقة'), ''],
                    ['hide_upselling_gift', 'checkbox', settings('hide_upselling_gift'), __('اخفاء الاب سيلنق في الاهداء'), ''],
                    ['hide_upselling_category', 'checkbox', settings('hide_upselling_category'), __('اخفاء الاب سيلنق في اختيار قسم'), ''],
                    ['hide_upselling_rate', 'checkbox', settings('hide_upselling_rate'), __('اخفاء الاب سيلنق عند اتمام التقييم'), ''],
                ];
            default:
                return [];
        }
    }
}
