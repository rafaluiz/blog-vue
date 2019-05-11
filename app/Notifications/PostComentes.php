<?php

namespace App\Notifications;

use App\Models\Coment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PostComentes extends Notification //implements ShouldQueue
{
    use Queueable;
    private $comment;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Coment $comment)
    {
        $this->comment = $comment;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                    ->subject("Novo comentario:{$this->comment->title}")
                    ->line($this->comment->body)
                    ->action('ver os comentario', route('posts.show',$this->comment->post_id))
                    ->line('Abraço');
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

        public function toDatabase($notifiable)
    {
        return [
            'comment' => $this->comment->load('user'),
        ];
    }
}
