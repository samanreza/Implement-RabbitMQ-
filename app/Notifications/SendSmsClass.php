<?php

namespace App\Notifications;

use App\Channels\SmsChannel;
use App\Services\RabbitMQMain;
use App\SmsGateWay\KavehNegar;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendSmsClass extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [SmsChannel::class];
    }


    /**
     * @param $notifiable
     * @return string
     */
    public function toSms($notifiable): string
    {
        return (new KavehNegar)
            ->from($notifiable->from)
            ->to($notifiable->to)
            ->line($notifiable->message)
            ->send();
        /**
         * if you want to use with pour php
         */
        //(new RabbitMQMain)->publish((new KavehNegar)
        //            ->from($notifiable->from)
        //            ->to($notifiable->to)
        //            ->line($notifiable->message)
        //            ->send());
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }
}
