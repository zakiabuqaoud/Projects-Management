<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class CompleteProjectsNotifications extends Notification
{
    use Queueable;
    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
            //    'mail',
            'database',
        ];
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
            ->subject('The project has been completed')
            ->greeting('Hi ' . $notifiable->name)
            ->line(sprintf('%s has completed the Project.', $notifiable));
    }
    public function toDatabase($notifiable)
    {
        return [
            'title' => 'the Project was completed',
            'greeting' => sprintf(' Hi %s , we have finished from project ', $notifiable->name),
            'body' => sprintf(' I %s , we have finished from project ', $this->user->name),
            'action' => url(route('developersPages.myProjects')),

        ];
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
