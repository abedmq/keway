<?php

namespace App\Notifications;

use App\Channel\SmsChannel;
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

class CancelOrderNotification extends Notification {

    use Queueable,NotificationUtilities;

    private $order;
    private $cancelUser;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order, $cancelUser)
    {
        //
        $this->order      = $order;
        $this->cancelUser = $cancelUser;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [FcmChannel::class, 'database', ];//SmsChannel::class to send to sms
    }

    public function toFcm($notifiable)
    {
        return FcmMessage::create()
            ->setData($this->prepareDataFcm($this->toArray($notifiable)))
            ->setNotification(\NotificationChannels\Fcm\Resources\Notification::create()
                ->setTitle(trans('api.cancel_order.title', [], $notifiable->preferredLocale()))
            ->setBody(trans('api.cancel_order.body', ['name' => @$this->cancelUser->name,'reason'=>$this->order->getCancelReason()], $notifiable->preferredLocale()))
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
            'order_id' => $this->order->id,
            'type'     => 'cancel_order',
            'msg'    => [
                'ar'=>trans('api.cancel_order.body', ['name' => @$this->cancelUser->name,'reason'=>$this->order->getCancelReason()], 'ar'),
                'en'=>trans('api.cancel_order.body', ['name' => @$this->cancelUser->name,'reason'=>$this->order->getCancelReason()], 'en'),
            ],
        ];
    }

    function ToSms($notifiable)
    {
        return [
            'mobile' => @$this->mobile ?: $notifiable->mobile,
            'msg'    => trans('api.cancel_order.body', ['name' => @$this->cancelUser->name,'reason'=>$this->order->getCancelReason()], $notifiable->preferredLocale()),
        ];
    }
}
