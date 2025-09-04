<?php

declare(strict_types=1);

namespace App\Notifications;

use App\Models\InquiryReply;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

final class InquiryReplyEmail extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        private readonly InquiryReply $inquiryReply
    ) {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->from($this->inquiryReply->user->email, $this->inquiryReply->user->name)
            ->replyTo($this->inquiryReply->user->email, $this->inquiryReply->user->name)
            ->subject('Reply to Your Contact Message')
            ->greeting('Hello,')
            ->line('You have received a reply to your contact message:')
            ->line('---')
            ->line(str('>'.new HtmlString($this->inquiryReply->message))->toHtmlString())
            ->line('---')
            ->line('Please reply to this email if you have any further questions or concerns.')
            ->line('If you were not expecting this email, please ignore it.');
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
