<?php

namespace App\Notifications;

use App\Notifications\Traits\SetDataForNotifications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GeneralNotification extends Notification /* implements ShouldQueue */
{
    use Queueable;
    use SetDataForNotifications;

    public $tries = 2;

    public $timeout = 10;

    public function __construct()
    {
        $this->subject = 'اشعار جديد';
        $this->greeting = 'مرحباً';
        $this->actionUrl = env('APP_URL');
        $this->actionText = env('APP_NAME');
        $this->methods = ['database'];
        $this->image = env('DEFAULT_IMAGE_AVATAR');
        $this->actionUrl = env('APP_URL');
    }

    public function via($notifiable)
    {
        return $this->methods;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject($this->subject)
            ->greeting($this->greeting)
            ->line($this->content)
            ->action($this->actionText, $this->actionUrl);

    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => '<a href="'.$this->actionUrl.'">'.$this->content.'</a>',
            'image' => $this->image,
        ];
    }
}
