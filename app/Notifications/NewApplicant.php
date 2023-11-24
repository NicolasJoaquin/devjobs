<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewApplicant extends Notification
{
    use Queueable;
    public $applicant;
    public $job_id;
    public $job_title;
    public $user_id;
    /**
     * Create a new notification instance.
     */
    public function __construct($job_id, $job_title, $user_id)
    {
        $this->job_id = $job_id;
        $this->job_title = $job_title;
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/notifications');
        return (new MailMessage)
            ->line('Has recibido un nuevo candidato en tu vacante de empleo.')
            ->line('La vacante es: ' . $this->job_title)
            ->action('Ver notificaciones', $url)
            ->line('¡Gracias por utilizar DevJobs!');
    }
    // Almacena las notificaciones en la DB
    public function toDatabase(object $notifiable) {
        return [
            'job_id' => $this->job_id,
            'job_title' => $this->job_title,
            'user_id' => $this->user_id,
        ];
    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
