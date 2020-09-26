<?php


namespace Burakaktna\LaravelVatanSMS;

use App\Facades\VatanSMS;
use Illuminate\Support\Facades\Notification;

/**
 * Class VatanSMSChannel
 * @package App\Channels
 */
class VatanSMSChannel
{

    /**
     * @param $notifiable
     * @param  Notification  $notification
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toVatanSMS($notifiable);
        VatanSMS::sendSms($message->getContent(), $message->getRecipients())->submit();
    }
}