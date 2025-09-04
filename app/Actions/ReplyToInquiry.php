<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Inquiry;
use App\Notifications\InquiryReplyEmail;
use Illuminate\Support\Facades\Notification;

final class ReplyToInquiry
{
    public function execute(Inquiry $inquiry, array $data): void
    {
        $inquiryReply = $inquiry->replies()->create(array_merge(
            $data,
            [
                'user_id' => auth()->id(),
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]
        ));

        Notification::route('mail', [
            $inquiry->email => $inquiry->name,
        ])
            ->notify(new InquiryReplyEmail($inquiryReply));
    }
}
