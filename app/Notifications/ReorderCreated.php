<?php

namespace App\Models;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ReorderCreated extends Notification
{
    use Queueable;

    public $productName;

    public function __construct($productName)
    {
        $this->productName = $productName;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // or just ['mail']
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Reorder Created')
                    ->line("A reorder has been created for product: {$this->productName}.")
                    ->action('View Reorders', url('/reorders'))
                    ->line('Thank you for using our SCM system!');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => "Reorder placed for {$this->productName}"
        ];
    }
}