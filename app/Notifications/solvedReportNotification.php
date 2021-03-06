<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class solvedReportNotification extends Notification
{
    use Queueable;
    public $username;
    public $reportID;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($username, $reportID)
    {
        $this->username = $username;
        $this->reportID = $reportID;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Hello '.$this->username.',')
                    ->line('Your report has been reviewed and solved. Please inform us if you have any further issue.')
                    // ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'data' => 'Dear '.$this->username.' your report has been solved.',
            'url' => '/user/report-problem/'.$this->reportID,
        ];
    }
}
