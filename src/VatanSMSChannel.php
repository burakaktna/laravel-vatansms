<?php


namespace Burakaktna\LaravelVatanSMS;

use Burakaktna\LaravelVatanSMS\Facades\VatanSMS;
use Illuminate\Notifications\Notification;

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
