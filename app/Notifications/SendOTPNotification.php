<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class SendOTPNotification extends Notification
{
    public $otp;

    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    public function toMail($notifiable)
    {
        return (new \Illuminate\Notifications\Messages\MailMessage)
            ->line('Your OTP is: ' . $this->otp)
            ->action('Verify OTP', route('verify-otp'))
            ->line('If you did not request this OTP, no action is required.');
    }

    // Add the "via" method to specify the notification channel
    public function via($notifiable)
    {
        return ['mail']; // You can add other channels here if needed
    }
}
