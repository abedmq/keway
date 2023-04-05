<?php

namespace App\Notifications;

use App\Channel\SmsChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Fcm\Resources\AndroidConfig;
use NotificationChannels\Fcm\Resources\AndroidFcmOptions;
use NotificationChannels\Fcm\Resources\AndroidNotification;
use NotificationChannels\Fcm\Resources\ApnsConfig;
use NotificationChannels\Fcm\Resources\ApnsFcmOptions;

class SendCodeNotification extends Notification {

    use Queueable,NotificationUtilities;

    private $type;
    /**
     * @var null
     */
    private $mobile;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($type, $mobile = null)
    {
        //
        $this->type   = $type;
        $this->mobile = $mobile;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [SmsChannel::class];
    }

    function ToSms($notifiable)
    {
        return [
            'mobile' => @$this->mobile ?: $notifiable->mobile,
            'msg'    => trans('auth.' . $this->type, ['code' => $notifiable->mobile_code],$notifiable->preferredLocale()),
        ];
    }


}
