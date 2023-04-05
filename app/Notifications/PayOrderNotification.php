<?php

namespace App\Notifications;

use App\Channel\SmsChannel;
use App\Models\PaymentMethod;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;
use NotificationChannels\Fcm\Resources\AndroidConfig;
use NotificationChannels\Fcm\Resources\AndroidFcmOptions;
use NotificationChannels\Fcm\Resources\AndroidNotification;
use NotificationChannels\Fcm\Resources\ApnsConfig;
use NotificationChannels\Fcm\Resources\ApnsFcmOptions;

class PayOrderNotification extends Notification {

    use Queueable,NotificationUtilities;

    private $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        //
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [FcmChannel::class, 'database'];//,  to send to sms
    }

    public function toFcm($notifiable)
    {
        return FcmMessage::create()
            ->setData($this->prepareDataFcm($this->toArray($notifiable)))
            ->setNotification(\NotificationChannels\Fcm\Resources\Notification::create()
                ->setTitle(trans('api.pay_order' . ($this->order->payment_id == PaymentMethod::CACHE ? "_cache" : "") . '.title', [], $notifiable->preferredLocale()))
            ->setBody(trans('api.pay_order' . ($this->order->payment_id == PaymentMethod::CACHE ? "_cache" : "") . '.body', ['name' => @$this->order->user->name,'price' => $this->order->total_price], $notifiable->preferredLocale()))
//                ->setImage('http://example.com/url-to-image-here.png')
    )
            ->setAndroid(
                AndroidConfig::create()
                    ->setFcmOptions(AndroidFcmOptions::create()->setAnalyticsLabel('analytics'))
                    ->setNotification(AndroidNotification::create()->setColor('#0A0A0A'))
            )->setApns(
                ApnsConfig::create()
                    ->setFcmOptions(ApnsFcmOptions::create()->setAnalyticsLabel('analytics_ios')));
    }


    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
            'order_id'    => $this->order->id,
            'payment_id'  => $this->order->payment_id,
            'total_price' => $this->order->total_price,
            'type'        => 'pay_order' . ($this->order->payment_id == PaymentMethod::CACHE ? "_cache" : ""),
            'msg'    => [
                'ar'=>trans('api.pay_order' . ($this->order->payment_id == PaymentMethod::CACHE ? "_cache" : "") . '.body', ['name' => @$this->order->user->name, 'price' => $this->order->total_price], 'ar'),
                'en'=>trans('api.pay_order' . ($this->order->payment_id == PaymentMethod::CACHE ? "_cache" : "") . '.body', ['name' => @$this->order->user->name, 'price' => $this->order->total_price], 'en'),
            ],
        ];
    }

    function ToSms($notifiable)
    {
        return [
            'mobile' => @$this->mobile ?: $notifiable->mobile,
            'msg'    => trans('api.pay_order' . ($this->order->payment_id == PaymentMethod::CACHE ? "_cache" : "") . '.body', ['name' => @$this->order->user->name, 'price' => $this->order->total_price], $notifiable->preferredLocale()),
        ];
    }
}