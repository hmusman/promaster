<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class adminReportNotification extends Notification
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
        return ['mail'];
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
                    ->greeting('Hello Admin')
                    ->line('A report is posted by '.$this->username.' that need review. Please visit your dashboard and see pending reports. Please solve them and marked as solved.')
                    ->action('View Problem', url('/admin/report-problem/'.$this->reportID))
                    ->line('Thank you form Administration for being cooprative.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
