<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageReaded extends Notification
{
    use Queueable;

    private $sender_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($sender_id)
    {
        $this->sender_id = $sender_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */

     public function toDatabase($notifiable)
     {
         return [
            'id' =>$this->sender_id,
            'title' => 'A message has been sent by',
            'user_name' => auth()->user()->name,
            'image_url' => auth()->user()->image_url,
         ];
     }

}
